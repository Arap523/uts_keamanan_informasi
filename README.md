# Vehicle Management System – Laravel 12 + Filament 3

Sistem manajemen kendaraan berbasis Laravel 12 dan Filament 3 yang dilengkapi dengan fitur keamanan, enkripsi data sensitif, dan relasi antar entitas utama. Proyek ini dirancang untuk penggunaan oleh administrator saja, dengan antarmuka berbasis panel admin yang intuitif.

---

## Fitur Utama

- Manajemen data **Kendaraan**, **Kategori**, **Pemilik**, dan **Penyewaan**
- Admin panel berbasis **Filament 3**
- Tidak menggunakan multi-user — hanya admin (role default)
- **Enkripsi data sensitif** seperti `plat_nomor`
- Validasi dan sanitasi input secara menyeluruh
- Relasi data antar entitas menggunakan Eloquent ORM
- Pemisahan tampilan dan kontrol data untuk menjaga integritas

---

## Struktur Entitas dan Relasi

### 1. **Kendaraan**
- Field: `id`, `nama_kendaraan`, `plat_nomor`, `kategori_id`, `pemilik_id`
- Relasi:
  - belongsTo `Kategori`
  - belongsTo `Pemilik`
  - hasMany `Penyewaan`

### 2. **Kategori**
- Field: `id`, `nama_kategori`
- Relasi:
  - hasMany `Kendaraan`

### 3. **Pemilik**
- Field: `id`, `nama`, `alamat`, `no_hp`
- Relasi:
  - hasMany `Kendaraan`

### 4. **Penyewaan**
- Field: `id`, `kendaraan_id`, `tanggal_mulai`, `tanggal_selesai`, `penyewa`
- Relasi:
  - belongsTo `Kendaraan`

---

## Keamanan dan Proteksi Data

### 1. Akses Admin via Filament Shield
- Otorisasi diatur menggunakan Filament Shield, yaitu:
  - Penentuan permission dan role untuk mengontrol akses resource.
  - Semua akses hanya untuk role admin.
  - Tidak ada endpoint publik.
###  2. Enkripsi Data Sensitif
- Data plat nomor dianggap sensitif dan dienkripsi menggunakan native cast dari Laravel:
```php
protected \$casts = [
    'plat_nomor' => 'encrypted',
];
```

###  3. Validasi Form dan Sanitasi Input
- Seluruh form menggunakan validasi seperti:
```php
TextInput::make('nama_kendaraan')->required()->maxLength(50)
```
- Validasi Laravel mencegah input tidak sah.
- Blade auto-escape mencegah XSS.

### 4. Integrity dan Foreign Key
- Migrasi menggunakan foreign key:
```php
$table->foreignId('kategori_id')->constrained()->onDelete('cascade');
```
- Mencegah orphaned data saat entitas utama dihapus.

### 5. Proteksi Laravel Default
- **CSRF protection** aktif secara default untuk semua form.
- Tidak ada manipulasi data via URL langsung (akses melalui panel).
- Tidak menggunakan Mass Assignment (`$fillable` ditentukan).

---



##  Teknologi

- Laravel 12
- Filament v3
- MySQL / MariaDB
- TailwindCSS (via Filament)
- Filament Shield

---

##  Struktur Panel Admin

- `/admin/kendaraan` – Kelola kendaraan, relasi ke kategori & pemilik
- `/admin/kategori` – Kelola daftar kategori kendaraan
- `/admin/pemilik` – Kelola data pemilik kendaraan
- `/admin/penyewaan` – Riwayat penyewaan kendaraan

---



