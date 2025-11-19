import React from 'react';
import { Zap, QrCode, Package, BarChart3, Smartphone } from 'lucide-react';

const Features = () => {
  const features = [
    {
      icon: Package,
      title: 'Pencatatan Lengkap',
      description: 'Catat pengeluaran, produk, penjualan, akuntansi, cabang, dan manajemen karyawan dalam satu sistem.',
      color: 'var(--color-primary)',
    },
    {
      icon: BarChart3,
      title: 'Laporan Harian, Mingguan & Bulanan',
      description: 'Pantau performa bisnis dengan laporan otomatis yang lengkap dan mudah dipahami.',
      color: 'var(--color-secondary)',
    },
    {
      icon: Smartphone,
      title: 'Aplikasi Kasir Mudah',
      description: 'Interface kasir yang intuitif dan cepat, bisa digunakan langsung tanpa training khusus.',
      color: 'var(--color-primary)',
    },
    {
      icon: QrCode,
      title: 'Pembayaran QRIS',
      description: 'Terima pembayaran QRIS dengan mudah, MDR kompetitif dan pencairan dana cepat.',
      color: 'var(--color-secondary)',
    },
    {
      icon: Zap,
      title: 'Multi Device & Real-time',
      description: 'Akses dari web & mobile Android. Data tersinkronisasi real-time untuk semua perangkat.',
      color: 'var(--color-primary)',
    },
  ];

  return (
    <section id="fitur" className="section section-alt">
      <div className="container">
        {/* Section Header */}
        <div style={{ textAlign: 'center', marginBottom: '4rem', maxWidth: '700px', margin: '0 auto 4rem' }}>
          <div
            style={{
              display: 'inline-flex',
              alignItems: 'center',
              gap: '8px',
              background: 'rgba(0, 168, 232, 0.1)',
              border: '1px solid rgba(0, 168, 232, 0.2)',
              borderRadius: '9999px',
              padding: '6px 16px',
              marginBottom: '1.5rem',
            }}
          >
            <Zap size={16} style={{ color: 'var(--color-secondary)' }} />
            <span
              style={{
                fontSize: '0.875rem',
                fontWeight: '600',
                color: 'var(--color-secondary-dark)',
              }}
            >
              Fitur Unggulan
            </span>
          </div>
          <h2 className="heading-2" style={{ marginBottom: '1rem' }}>
            Semua yang Anda Butuhkan
            <br />
            dalam Satu Aplikasi
          </h2>
          <p className="body-large" style={{ color: 'var(--text-secondary)' }}>
            Fitur lengkap untuk mengelola bisnis UMKM Anda dengan mudah dan efisien
          </p>
        </div>

        {/* Features Grid */}
        <div
          style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))',
            gap: '2rem',
          }}
        >
          {features.map((feature, index) => {
            const IconComponent = feature.icon;
            return (
              <div key={index} className="feature-card">
                <div
                  className="icon-wrapper"
                  style={{
                    background:
                      feature.color === 'var(--color-primary)'
                        ? 'linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(255, 193, 7, 0.1))'
                        : 'linear-gradient(135deg, rgba(0, 168, 232, 0.2), rgba(0, 168, 232, 0.1))',
                  }}
                >
                  <IconComponent size={28} style={{ color: feature.color }} />
                </div>
                <h3 className="heading-3" style={{ marginBottom: '0.75rem', fontSize: '1.25rem' }}>
                  {feature.title}
                </h3>
                <p className="body-medium" style={{ color: 'var(--text-secondary)', margin: 0 }}>
                  {feature.description}
                </p>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
};

export default Features;