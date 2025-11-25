import React from 'react';
import { Target, Heart, Users } from 'lucide-react';

const BrandStory = () => {
  return (
    <section id="tentang" className="section" style={{ background: 'var(--bg-page)' }}>
      <div className="container">
        {/* Brand Story */}
        <div
          style={{
            display: 'grid',
            gridTemplateColumns: '1fr',
            gap: '4rem',
            marginBottom: '5rem',
          }}
        >
          <div style={{ textAlign: 'center', maxWidth: '800px', margin: '0 auto' }}>
            <div
              style={{
                display: 'inline-flex',
                alignItems: 'center',
                gap: '8px',
                background: 'rgba(255, 193, 7, 0.1)',
                border: '1px solid rgba(255, 193, 7, 0.3)',
                borderRadius: '9999px',
                padding: '6px 16px',
                marginBottom: '1.5rem',
              }}
            >
              <Heart size={16} style={{ color: 'var(--color-primary)' }} />
              <span
                style={{
                  fontSize: '0.875rem',
                  fontWeight: '600',
                  color: 'var(--color-primary-dark)',
                }}
              >
                Tentang Kami
              </span>
            </div>
            <h2 className="heading-2" style={{ marginBottom: '1.5rem' }}>
              PT Langit Karya Utama
            </h2>
            <p className="body-large" style={{ color: 'var(--text-secondary)', marginBottom: '2rem' }}>
              Perusahaan teknologi yang memiliki visi untuk mendukung UMKM di Indonesia dengan
              menyediakan aplikasi POS yang mudah digunakan, cepat dipelajari, dan terjangkau.
            </p>
            <p className="body-medium" style={{ color: 'var(--text-secondary)' }}>
              Kami berkomitmen menyederhanakan proses penjualan dan memajukan digitalisasi UMKM
              Indonesia, satu toko pada satu waktu.
            </p>
          </div>
        </div>

        {/* Vision & Mission */}
        <div
          style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))',
            gap: '2rem',
          }}
        >
          {/* Vision Card */}
          <div
            className="feature-card"
            style={{
              background: 'linear-gradient(135deg, rgba(0, 168, 232, 0.05), rgba(0, 168, 232, 0.02))',
              borderColor: 'rgba(0, 168, 232, 0.2)',
            }}
          >
            <div
              className="icon-wrapper"
              style={{
                background: 'linear-gradient(135deg, rgba(0, 168, 232, 0.2), rgba(0, 168, 232, 0.1))',
              }}
            >
              <Target size={28} style={{ color: 'var(--color-secondary)' }} />
            </div>
            <h3 className="heading-3" style={{ marginBottom: '1rem' }}>
              Visi Kami
            </h3>
            <p className="body-medium" style={{ color: 'var(--text-secondary)' }}>
              Menjadi solusi POS paling sederhana dan terpercaya bagi UMKM Indonesia, membantu
              mereka bertumbuh melalui digitalisasi operasional toko.
            </p>
          </div>

          {/* Mission Card */}
          <div
            className="feature-card"
            style={{
              background: 'linear-gradient(135deg, rgba(255, 193, 7, 0.05), rgba(255, 193, 7, 0.02))',
              borderColor: 'rgba(255, 193, 7, 0.2)',
            }}
          >
            <div
              className="icon-wrapper"
              style={{
                background: 'linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(255, 193, 7, 0.1))',
              }}
            >
              <Users size={28} style={{ color: 'var(--color-primary)' }} />
            </div>
            <h3 className="heading-3" style={{ marginBottom: '1rem' }}>
              Misi Kami
            </h3>
            <ul
              style={{
                listStyle: 'none',
                padding: 0,
                display: 'flex',
                flexDirection: 'column',
                gap: '0.75rem',
              }}
            >
              <li style={{ display: 'flex', gap: '0.5rem' }}>
                <span style={{ color: 'var(--color-primary)', fontWeight: '600' }}>•</span>
                <span style={{ fontSize: '0.95rem', color: 'var(--text-secondary)' }}>
                  Menyediakan aplikasi POS yang mudah dipahami
                </span>
              </li>
              <li style={{ display: 'flex', gap: '0.5rem' }}>
                <span style={{ color: 'var(--color-primary)', fontWeight: '600' }}>•</span>
                <span style={{ fontSize: '0.95rem', color: 'var(--text-secondary)' }}>
                  Menyederhanakan pencatatan penjualan harian
                </span>
              </li>
              <li style={{ display: 'flex', gap: '0.5rem' }}>
                <span style={{ color: 'var(--color-primary)', fontWeight: '600' }}>•</span>
                <span style={{ fontSize: '0.95rem', color: 'var(--text-secondary)' }}>
                  Mempercepat pembayaran via QRIS
                </span>
              </li>
              <li style={{ display: 'flex', gap: '0.5rem' }}>
                <span style={{ color: 'var(--color-primary)', fontWeight: '600' }}>•</span>
                <span style={{ fontSize: '0.95rem', color: 'var(--text-secondary)' }}>
                  Memberikan MDR yang kompetitif
                </span>
              </li>
              <li style={{ display: 'flex', gap: '0.5rem' }}>
                <span style={{ color: 'var(--color-primary)', fontWeight: '600' }}>•</span>
                <span style={{ fontSize: '0.95rem', color: 'var(--text-secondary)' }}>
                  Mendukung berbagai jenis UMKM
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  );
};

export default BrandStory;