<?php

namespace App\Services;

class BiAnalysisService
{
    /**
     * Generate a comprehensive BI analysis for a specific dataset.
     * Assignment: Business Intelligence – Vera Wati, M.Kom (Pertemuan 3)
     * Context: Smart City Ecosystem
     *
     * @param array $dataset
     * @return array
     */
    public function generateAnalysis(array $dataset): array
    {
        $title = $dataset['name'] ?? $dataset['nama_data'] ?? '';
        $topic = $dataset['topik_name'] ?? $dataset['nama_topik'] ?? 'General';
        $org = $dataset['organisasi_name'] ?? $dataset['nama_skpd'] ?? 'Pemerintah';

        $mlPotential = $this->analyzeMlPotential($title, $topic);

        return [
            'methodology' => $this->generateMethodology($mlPotential['model']),
            'machine_learning' => $mlPotential,
            'dashboard_design' => $this->designDashboard($title, $topic, $org),
            'decision_making' => $this->formulateDecisions($title, $topic, $org),
        ];
    }

    /**
     * 2. Analisis Potensi Machine Learning
     * "Apakah permasalahan dapat diselesaikan dengan pendekatan prediktif?"
     */
    protected function analyzeMlPotential(string $title, string $topic): array
    {
        $titleLower = strtolower($title);
        $potential = [
            'is_predictive' => false,
            'model' => 'Descriptive Analysis (Non-Predictive)',
            'explanation' => 'Saat ini data lebih bersifat historis-deskriptif. Namun, dalam konteks Smart City, jika diperkaya dengan dimensi waktu yang panjang, dapat dikembangkan menjadi Predictive Maintenance atau Planning.',
            'example' => 'Monitoring status saat ini untuk respons cepat (Real-time monitoring).',
        ];

        // ASSIGNMENT SPECIFIC: BANJIR (Flood) -> Regression
        if (str_contains($titleLower, 'banjir')) {
            $potential['is_predictive'] = true;
            $potential['model'] = 'Regresi (Forecasting) & Spatial Analysis';
            $potential['explanation'] = 'Sangat kritis untuk Smart Environment. Data curah hujan dan debit air historis dapat dimodelkan untuk memprediksi potensi banjir.';
            $potential['example'] = 'Memprediksi jumlah titik banjir dan radius genangan saat musim hujan tiba.';
            return $potential;
        }

        // ASSIGNMENT SPECIFIC: SAMPAH (Waste) -> Regression / Forecasting
        if (str_contains($titleLower, 'sampah') || str_contains($titleLower, 'kebersihan')) {
            $potential['is_predictive'] = true;
            $potential['model'] = 'Regresi (Time Series Forecasting)';
            $potential['explanation'] = 'Penting untuk Smart Living. Volume sampah harian memilki pola tren yang dapat diprediksi (misal: meningkat saat hari raya).';
            $potential['example'] = 'Memprediksi volume sampah harian untuk optimasi jadwal pengangkutan truk.';
            return $potential;
        }

        // 1. REGRESSION (Time Series / Forecasting)
        // Keywords: Jumlah, Nilai, Produksi, Tren, Pertumbuhan
        if (str_contains($titleLower, 'jumlah') || str_contains($titleLower, 'nilai') || str_contains($titleLower, 'produksi')) {
            $potential['is_predictive'] = true;
            $potential['model'] = 'Regresi (Forecasting/Time Series)';
            $potential['explanation'] = 'Permasalahan ini DAPAT diselesaikan dengan pendekatan prediktif. Dengan menggunakan algoritma Regresi Linear atau ARIMA pada data historis, kita dapat memproyeksikan kebutuhan sumber daya di masa depan (Smart Planning).';
            $potential['example'] = 'Memprediksi tren ' . $titleLower . ' 5 tahun ke depan untuk perencanaan yang presisi.';
        }

        // 2. CLUSTERING (Segmentation)
        // Keywords: Per Kecamatan, Per Desa, Wilayah, Sebaran
        elseif (str_contains($titleLower, 'per kecamatan') || str_contains($titleLower, 'per desa') || str_contains($titleLower, 'wilayah')) {
            $potential['is_predictive'] = true;
            $potential['model'] = 'Clustering (K-Means / Hierarchical)';
            $potential['explanation'] = 'Sangat relevan untuk strategi Smart Branding & Smart Living. Teknik Clustering dapat mengelompokkan wilayah berdasarkan kemiripan karakteristik tanpa label sebelumnya (Unsupervised Learning).';
            $potential['example'] = 'Mengelompokkan kecamatan menjadi 3 klaster: "Prioritas Tinggi", "Menengah", dan "Rendah" berdasarkan ' . $titleLower . '.';
        }

        // 3. CLASSIFICATION (Risk/Status)
        // Keywords: Status, Kategori, Kondisi, Indeks
        elseif (str_contains($titleLower, 'status') || str_contains($titleLower, 'kategori') || str_contains($titleLower, 'kondisi')) {
            $potential['is_predictive'] = true;
            $potential['model'] = 'Klasifikasi (Decision Tree / Naive Bayes)';
            $potential['explanation'] = 'Dapat digunakan untuk manajemen risiko (Smart Governance). Model dapat memprediksi status masa depan (misal: Rawan/Aman) berdasarkan pola atribut data historis.';
            $potential['example'] = 'Deteksi dini risiko perubahan status pada ' . $titleLower . ' sebelum kejadian terjadi.';
        }

        return $potential;
    }

    /**
     * 3. Rancang Dashboard Business Intelligence
     * "Berdasarkan KPI yang telah ditentukan..."
     */
    protected function designDashboard(string $title, string $topic, string $org): array
    {
        // Define Specific Audience (Smart Governance Stakeholders)
        $targetAudience = 'Publik & NGO (Transparansi)';
        if (str_contains(strtolower($org), 'dinas') || str_contains(strtolower($org), 'badan')) {
            $targetAudience = 'Bupati (Strategic), Kepala ' . $org . ' (Tactical), Camat (Operational)';
        }

        // Visualizations mandated by user request
        // Must include: Scorecard, Tabel Rincian, Bar Chart
        $charts = [
            'Scorecard (Angka Utama Real-time)',
            'Bar Chart (Perbandingan Antar Kategori/Wilayah)',
            'Tabel Rincian (Drill-down Data)'
        ];

        // Add additional smart charts based on context
        if (str_contains(strtolower($title), 'per tahun') || str_contains(strtolower($title), 'bulan')) {
            $charts[] = 'Line Chart (Analisis Tren Waktu)';
        }
        if (str_contains(strtolower($title), 'per kecamatan') || str_contains(strtolower($title), 'lokasi')) {
            $charts[] = 'Heatmap / Choropleth Map (Distribusi Spasial)';
        }

        // KPI Smart City Context
        $kpi = 'Total ' . $title . ' Tahun Berjalan';
        $secondary_kpi = '% Pertumbuhan (YoY) vs Target RPJMD';

        return [
            'kpi' => $kpi,
            'secondary_kpi' => $secondary_kpi,
            'visualizations' => $charts,
            'audience' => $targetAudience,
        ];
    }

    /**
     * 4. Rumuskan Keputusan Berbasis Data
     * "Hubungkan jawaban dengan konsep data-driven decision making"
     */
    protected function formulateDecisions(string $title, string $topic, string $org): array
    {
        $policy = '';
        $alternative = '';
        $basis = '';

        $titleLower = strtolower($title);

        // Specific Context for Assignment Examples (Banjir / Sampah)
        if (str_contains($titleLower, 'banjir')) {
            $policy = 'Pembangunan infrastruktur pengendali banjir (tanggul/pompa) di titik prediksi luapan tertinggi.';
            $alternative = 'Normalisasi sungai (Jangka Panjang) vs Pengerukan sedimen rutin (Jangka Pendek).';
            $basis = 'Predictive Analytics: Menggunakan data curah hujan dan debit air historis untuk memprediksi lokasi banjir sebelum terjadi.';
        } elseif (str_contains($titleLower, 'sampah') || str_contains($titleLower, 'kebersihan')) {
            $policy = 'Optimalisasi rute truk sampah berdasarkan volume harian di TPS (Smart Waste Management).';
            $alternative = 'Penambahan armada truk vs Pembangunan TPST 3R di tingkat kecamatan.';
            $basis = 'Efficiency-Based Decision: Rute dinamis dapat menghemat BBM hingga 30% dibanding rute statis.';
        }
        // General decisions based on Topic
        else {
            switch (strtolower($topic)) {
                case 'kesehatan': // Smart Living
                    $policy = 'Realokasi sumber daya medis secara dinamis ke wilayah dengan tren kasus ' . $title . ' tertinggi.';
                    $alternative = 'Pembangunan fasilitas baru vs Mobile Health Unit ke desa terpencil.';
                    $basis = 'Evidence-Based Policy: Keputusan didasarkan pada Heatmap sebaran penyakit, bukan asumsi.';
                    break;
                case 'ekonomi': // Smart Economy
                    $policy = 'Pemberian insentif khusus bagi pelaku usaha di sektor yang terkait dengan ' . $title . '.';
                    $alternative = 'Bantuan langsung tunai vs Pelatihan digital marketing.';
                    $basis = 'Economic Forecasting: Menggunakan data tren ' . $title . ' untuk memprediksi sektor yang akan tumbuh.';
                    break;
                case 'pendidikan': // Smart People
                    $policy = 'Intervensi khusus pada sekolah/wilayah dengan indikator ' . $title . ' di bawah standar.';
                    $alternative = 'Rotasi guru berprestasi vs Peningkatan sarana fisik sekolah.';
                    $basis = 'Performance-Based Management: Evaluasi berbasis data riil capaian ' . $title . '.';
                    break;
                case 'infrastruktur': // Smart Environment
                    $policy = 'Prioritas perbaikan infrastruktur pada lokasi dengan data kerusakan ' . $title . ' terparah.';
                    $alternative = 'Perbaikan total (Reconstruction) vs Penambalan (Maintenance).';
                    $basis = 'Asset Lifecycle Management: Memprediksi usia sisa infrastruktur berdasarkan data kondisi saat ini.';
                    break;
                default: // Smart Governance
                    $policy = 'Digitalisasi layanan publik yang terkait dengan ' . $title . ' untuk memangkas birokrasi.';
                    $alternative = 'Penambahan loket pelayanan manual vs Pengembangan aplikasi mandiri.';
                    $basis = 'Service Excellence: Mengurangi waktu tunggu masyarakat berdasarkan analisis antrean data ' . $title . '.';
            }
        }

        return [
            'policy' => $policy,
            'alternative' => $alternative,
            'basis' => $basis,
        ];
    }

    /**
     * 1. Metodologi / Proses Pengerjaan (CRISP-DM simplified)
     */
    protected function generateMethodology(string $mlModel): array
    {
        $steps = [
            [
                'step' => '1. Business Understanding',
                'desc' => 'Identifikasi masalah utama: Kebutuhan efisiensi & prediksi masa depan.'
            ],
            [
                'step' => '2. Data Understanding',
                'desc' => 'Eksplorasi variabel dataset, cek missing values, dan distribusi data.'
            ],
        ];

        if (str_contains($mlModel, 'Regresi') || str_contains($mlModel, 'Regression')) {
            $steps[] = ['step' => '3. Data Preparation', 'desc' => 'Handling outlier, Lag features untuk Time Series.'];
            $steps[] = ['step' => '4. Modeling', 'desc' => 'Latih model Regresi / ARIMA dengan data historis 5 tahun.'];
            $steps[] = ['step' => '5. Evaluation', 'desc' => 'Validasi error menggunakan Metrics (RMSE / MAPE).'];
        } elseif (str_contains($mlModel, 'Clustering')) {
            $steps[] = ['step' => '3. Data Preparation', 'desc' => 'Normalisasi data (Min-Max/Z-Score) agar skala seragam.'];
            $steps[] = ['step' => '4. Modeling', 'desc' => 'Tentukan jumlah K optimal (Elbow Method) & jalankan K-Means.'];
            $steps[] = ['step' => '5. Evaluation', 'desc' => 'Validasi kualitas cluster dengan Silhouette Score.'];
        } else {
            // Classification / Default
            $steps[] = ['step' => '3. Data Preparation', 'desc' => 'Labeling data historis & Balancing kelas.'];
            $steps[] = ['step' => '4. Modeling', 'desc' => 'Latih algoritma Klasifikasi (Decision Tree / Naive Bayes).'];
            $steps[] = ['step' => '5. Evaluation', 'desc' => 'Cek akurasi, Precision, Recall, dan F1-Score.'];
        }

        $steps[] = ['step' => '6. Deployment', 'desc' => 'Implementasi ke Dashboard BI untuk monitoring real-time.'];

        return $steps;
    }
}
