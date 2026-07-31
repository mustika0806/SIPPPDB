<?php

namespace App\Http\Controllers;

use App\Models\InterviewTest;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class InterviewTestController extends Controller
{
    public function index()
    {
        $interviews = InterviewTest::with('user')
            ->latest()
            ->get();

        return view(
            'home.admin.interview.index',
            compact('interviews')
        );
    }

    public function create()
    {
        $students = User::where('level', 'siswa')
            ->orderBy('name')
            ->get();

        return view(
            'home.admin.interview.create',
            compact('students')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => [
                'required',
                'exists:users,id',
            ],

            'interview_type' => [
                'required',
                'in:online,offline',
            ],

            'interview_date' => [
                'required',
                'date',
            ],

            'interview_time' => [
                'required',
            ],

            'meeting_link' => [
                'required_if:interview_type,online',
                'nullable',
                'url',
            ],

            'interview_place' => [
                'required_if:interview_type,offline',
                'nullable',
                'string',
                'max:255',
            ],
        ], [
            'user_id.required' =>
                'Siswa harus dipilih.',

            'interview_type.required' =>
                'Jenis wawancara harus dipilih.',

            'interview_date.required' =>
                'Tanggal wawancara harus diisi.',

            'interview_time.required' =>
                'Jam wawancara harus diisi.',

            'meeting_link.required_if' =>
                'Link wawancara wajib diisi untuk wawancara online.',

            'meeting_link.url' =>
                'Link wawancara harus berupa URL yang valid.',

            'interview_place.required_if' =>
                'Lokasi wawancara wajib diisi untuk wawancara offline.',
        ]);

        $sudahAda = InterviewTest::where(
            'user_id',
            $request->user_id
        )->exists();

        if ($sudahAda) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Siswa sudah memiliki jadwal wawancara. Gunakan tombol Jadwal Ulang.'
                );
        }

        $data = [
            'user_id' => $request->user_id,
            'interview_type' => $request->interview_type,
            'interview_date' => $request->interview_date,
            'interview_time' => $request->interview_time,
            'score' => null,
            'notes' => null,
            'status' => 'terjadwal',
        ];

        if ($request->interview_type === 'online') {
            $data['meeting_link'] = $request->meeting_link;
            $data['interview_place'] = null;
        } else {
            $data['meeting_link'] = null;
            $data['interview_place'] =
                $request->interview_place;
        }

        InterviewTest::create($data);

        return redirect()
            ->route('admin.interview.index')
            ->with(
                'success',
                'Jadwal wawancara berhasil ditambahkan.'
            );
    }

    public function edit(Request $request, $id)
    {
        $interview = InterviewTest::with('user')
            ->findOrFail($id);

        $mode = $request->query('mode', 'hasil');

        if (!in_array($mode, ['hasil', 'jadwal'])) {
            $mode = 'hasil';
        }

        $students = User::where('level', 'siswa')
            ->orderBy('name')
            ->get();

        return view(
            'home.admin.interview.edit',
            compact(
                'interview',
                'students',
                'mode'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $interview = InterviewTest::findOrFail($id);

        $request->validate([
            'mode' => [
                'required',
                'in:hasil,jadwal',
            ],
        ]);

        if ($request->mode === 'jadwal') {
            return $this->updateJadwal(
                $request,
                $interview
            );
        }

        return $this->updateHasil(
            $request,
            $interview
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan Jadwal Ulang dan Buka WhatsApp
    |--------------------------------------------------------------------------
    */
    private function updateJadwal(
        Request $request,
        InterviewTest $interview
    ) {
        $request->validate([
            'interview_type' => [
                'required',
                'in:online,offline',
            ],

            'interview_date' => [
                'required',
                'date',
            ],

            'interview_time' => [
                'required',
            ],

            'meeting_link' => [
                'required_if:interview_type,online',
                'nullable',
                'url',
            ],

            'interview_place' => [
                'required_if:interview_type,offline',
                'nullable',
                'string',
                'max:255',
            ],
        ], [
            'interview_type.required' =>
                'Jenis wawancara harus dipilih.',

            'interview_date.required' =>
                'Tanggal wawancara harus diisi.',

            'interview_time.required' =>
                'Jam wawancara harus diisi.',

            'meeting_link.required_if' =>
                'Link wajib diisi untuk wawancara online.',

            'meeting_link.url' =>
                'Link wawancara tidak valid.',

            'interview_place.required_if' =>
                'Lokasi wajib diisi untuk wawancara offline.',
        ]);

        $data = [
            'interview_type' => $request->interview_type,
            'interview_date' => $request->interview_date,
            'interview_time' => $request->interview_time,
            'status' => $interview->score === null
                ? 'terjadwal'
                : $interview->status,
        ];

        if ($request->interview_type === 'online') {
            $data['meeting_link'] = $request->meeting_link;
            $data['interview_place'] = null;

            $jenisWawancara = 'Online';
            $linkAtauLokasi = $request->meeting_link;
        } else {
            $data['meeting_link'] = null;
            $data['interview_place'] =
                $request->interview_place;

            $jenisWawancara = 'Offline';
            $linkAtauLokasi =
                $request->interview_place;
        }

        $interview->update($data);
        $interview->load('user');

        $nomorWa = $this->ambilNomorWhatsApp(
            $interview->user_id
        );

        if (!$nomorWa) {
            return redirect()
                ->route('admin.interview.index')
                ->with(
                    'success',
                    'Jadwal wawancara berhasil diperbarui, tetapi nomor WhatsApp siswa tidak ditemukan.'
                );
        }

        $namaSiswa =
            optional($interview->user)->name
            ?? 'Calon Siswa';

        $tanggal = \Carbon\Carbon::parse(
            $request->interview_date
        )->format('d-m-Y');

        $jam = \Carbon\Carbon::parse(
            $request->interview_time
        )->format('H:i');

        $pesan =
            "Assalamu'alaikum, {$namaSiswa}.\n\n" .
            "Kami dari Panitia PPDB SMKS Ma'arif NU Kota Batam ingin menginformasikan bahwa jadwal wawancara Anda mengalami perubahan.\n\n" .
            "Jadwal wawancara terbaru:\n" .
            "Jenis: {$jenisWawancara}\n" .
            "Tanggal: {$tanggal}\n" .
            "Jam: {$jam}\n" .
            "Link/Lokasi: {$linkAtauLokasi}\n\n" .
            "Mohon mengikuti jadwal terbaru tersebut. Jadwal sebelumnya dinyatakan tidak berlaku.\n\n" .
            "Mohon hadir tepat waktu dan mengikuti arahan panitia. Terima kasih.";

        session()->flash(
            'success',
            'Jadwal wawancara berhasil diperbarui.'
        );

        return redirect()->away(
            'https://wa.me/' .
            $nomorWa .
            '?text=' .
            urlencode($pesan)
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan Hasil Penilaian
    |--------------------------------------------------------------------------
    */
    private function updateHasil(
        Request $request,
        InterviewTest $interview
    ) {
        $request->validate([
            'score' => [
                'required',
                'numeric',
                'min:0',
                'max:100',
            ],

            'notes' => [
                'required',
                'string',
                'max:1000',
            ],
        ], [
            'score.required' =>
                'Nilai wawancara harus diisi.',

            'score.numeric' =>
                'Nilai wawancara harus berupa angka.',

            'score.min' =>
                'Nilai wawancara minimal 0.',

            'score.max' =>
                'Nilai wawancara maksimal 100.',

            'notes.required' =>
                'Catatan wawancara harus diisi.',
        ]);

        $score = (int) $request->score;

        $status = $score >= 70
            ? 'lulus'
            : 'tidak_lulus';

        $interview->update([
            'score' => $score,
            'notes' => $request->notes,
            'status' => $status,
        ]);

        $siswa = Siswa::where(
            'user_id',
            $interview->user_id
        )->first();

        if ($siswa) {
            $siswa->update([
                'nilai_wawancara' => $score,
            ]);
        }

        return redirect()
            ->route('admin.interview.index')
            ->with(
                'success',
                'Hasil penilaian wawancara berhasil diperbarui.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Batalkan Jadwal dan Buka WhatsApp
    |--------------------------------------------------------------------------
    */
    public function batalkan($id)
    {
        $interview = InterviewTest::with('user')
            ->findOrFail($id);

        $interview->update([
            'status' => 'dibatalkan',
        ]);

        $nomorWa = $this->ambilNomorWhatsApp(
            $interview->user_id
        );

        if (!$nomorWa) {
            return redirect()
                ->route('admin.interview.index')
                ->with(
                    'success',
                    'Jadwal berhasil dibatalkan, tetapi nomor WhatsApp siswa tidak ditemukan.'
                );
        }

        $namaSiswa =
            optional($interview->user)->name
            ?? 'Calon Siswa';

        $pesan =
            "Assalamu'alaikum, {$namaSiswa}.\n\n" .
            "Kami dari Panitia PPDB SMKS Ma'arif NU Kota Batam menginformasikan bahwa jadwal wawancara Anda dibatalkan.\n\n" .
            "Informasi mengenai jadwal pengganti akan disampaikan kembali oleh pihak sekolah.\n\n" .
            "Mohon maaf atas perubahan tersebut. Terima kasih.";

        session()->flash(
            'success',
            'Jadwal wawancara berhasil dibatalkan.'
        );

        return redirect()->away(
            'https://wa.me/' .
            $nomorWa .
            '?text=' .
            urlencode($pesan)
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Mengambil dan Merapikan Nomor WhatsApp
    |--------------------------------------------------------------------------
    */
    private function ambilNomorWhatsApp($userId)
    {
        $siswa = Siswa::where(
            'user_id',
            $userId
        )->first();

        $user = User::find($userId);

        $nomorWa =
            optional($siswa)->no_hp
            ?? optional($siswa)->no_telp
            ?? optional($user)->no_hp
            ?? optional($user)->phone
            ?? null;

        if (!$nomorWa) {
            return null;
        }

        $nomorWa = preg_replace(
            '/[^0-9]/',
            '',
            $nomorWa
        );

        if (substr($nomorWa, 0, 1) === '0') {
            $nomorWa =
                '62' . substr($nomorWa, 1);
        } elseif (substr($nomorWa, 0, 1) === '8') {
            $nomorWa =
                '62' . $nomorWa;
        }

        return $nomorWa;
    }

    public function destroy($id)
    {
        $interview = InterviewTest::findOrFail($id);

        $siswa = Siswa::where(
            'user_id',
            $interview->user_id
        )->first();

        if ($siswa) {
            $siswa->update([
                'nilai_wawancara' => null,
            ]);
        }

        $interview->delete();

        return redirect()
            ->route('admin.interview.index')
            ->with(
                'success',
                'Data wawancara berhasil dihapus.'
            );
    }

    public function siswaIndex()
    {
        $interview = InterviewTest::with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        return view(
            'home.siswa.interview.index',
            compact('interview')
        );
    }
}