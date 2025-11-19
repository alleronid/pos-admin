import React from 'react';
import { Monitor, Smartphone, CheckCircle } from 'lucide-react';

const ProductShowcase = () => {
  return (
    <section className="section" style={{ background: 'var(--bg-page)' }}>
      <div className="container">
        {/* Section Header */}
        <div style={{ textAlign: 'center', marginBottom: '4rem' }}>
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
            <Monitor size={16} style={{ color: 'var(--color-secondary)' }} />
            <span
              style={{
                fontSize: '0.875rem',
                fontWeight: '600',
                color: 'var(--color-secondary-dark)',
              }}
            >
              Lihat Aplikasi
            </span>
          </div>
          <h2 className="heading-2" style={{ marginBottom: '1rem' }}>
            Interface yang Mudah
            <br />& Profesional
          </h2>
          <p className="body-large" style={{ color: 'var(--text-secondary)', maxWidth: '600px', margin: '0 auto' }}>
            Dirancang khusus untuk kemudahan penggunaan UMKM dengan tampilan modern dan intuitif
          </p>
        </div>

        {/* Desktop App Showcase */}
        <div
          style={{
            background: 'var(--bg-card)',
            borderRadius: '20px',
            padding: '2.5rem',
            marginBottom: '3rem',
            border: '1px solid var(--border-light)',
            boxShadow: '0 4px 20px rgba(0, 0, 0, 0.06)',
          }}
        >
          <div
            style={{
              display: 'flex',
              alignItems: 'center',
              gap: '1rem',
              marginBottom: '1.5rem',
            }}
          >
            <div
              style={{
                width: '48px',
                height: '48px',
                borderRadius: '12px',
                background: 'linear-gradient(135deg, rgba(0, 168, 232, 0.2), rgba(0, 168, 232, 0.1))',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
              }}
            >
              <Monitor size={24} style={{ color: 'var(--color-secondary)' }} />
            </div>
            <div>
              <h3 className="heading-3" style={{ marginBottom: '0.25rem', fontSize: '1.25rem' }}>
                Dashboard Web
              </h3>
              <p style={{ fontSize: '0.95rem', color: 'var(--text-secondary)', margin: 0 }}>
                Kelola bisnis Anda dari browser dengan dashboard lengkap
              </p>
            </div>
          </div>

          {/* Desktop Screenshot */}
          <div
            style={{
              borderRadius: '12px',
              overflow: 'hidden',
              border: '1px solid var(--border-light)',
              background: '#F5F5F5',
            }}
          >
            <img
              src="https://customer-assets.emergentagent.com/job_0cb1f9a2-4609-4da6-8470-d381af0fb9b3/artifacts/r5yerdf3_image.png"
              alt="Mirra Dashboard Web"
              style={{
                width: '100%',
                height: 'auto',
                display: 'block',
              }}
            />
          </div>

          {/* Features List */}
          <div
            style={{
              display: 'grid',
              gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))',
              gap: '1rem',
              marginTop: '2rem',
            }}
          >
            {[
              'Laporan Lengkap',
              'Manajemen Produk',
              'Akuntansi Terintegrasi',
              'Multi Cabang',
            ].map((feature, index) => (
              <div key={index} style={{ display: 'flex', alignItems: 'center', gap: '0.5rem' }}>
                <CheckCircle size={18} style={{ color: 'var(--color-secondary)', flexShrink: 0 }} />
                <span style={{ fontSize: '0.95rem', color: 'var(--text-body)' }}>{feature}</span>
              </div>
            ))}
          </div>
        </div>

        {/* Mobile App Showcase */}
        <div
          style={{
            background: 'linear-gradient(135deg, rgba(255, 193, 7, 0.05), rgba(0, 168, 232, 0.05))',
            borderRadius: '20px',
            padding: '2.5rem',
            border: '1px solid var(--border-light)',
          }}
        >
          <div
            style={{
              display: 'grid',
              gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))',
              gap: '3rem',
              alignItems: 'center',
            }}
          >
            {/* Mobile App Info */}
            <div>
              <div
                style={{
                  width: '48px',
                  height: '48px',
                  borderRadius: '12px',
                  background: 'linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(255, 193, 7, 0.1))',
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'center',
                  marginBottom: '1.5rem',
                }}
              >
                <Smartphone size={24} style={{ color: 'var(--color-primary)' }} />
              </div>
              <h3 className="heading-3" style={{ marginBottom: '1rem' }}>
                Aplikasi Mobile Android
              </h3>
              <p className="body-medium" style={{ color: 'var(--text-secondary)', marginBottom: '2rem' }}>
                Aplikasi kasir yang mudah digunakan di smartphone atau tablet Android. Sempurna untuk kasir dan
                pemilik toko yang selalu mobile.
              </p>

              {/* Mobile Features */}
              <div style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
                {[
                  'Interface kasir yang cepat',
                  'Scan barcode produk',
                  'Terima pembayaran QRIS',
                  'Laporan penjualan real-time',
                ].map((feature, index) => (
                  <div key={index} style={{ display: 'flex', alignItems: 'center', gap: '0.75rem' }}>
                    <CheckCircle size={20} style={{ color: 'var(--color-primary)', flexShrink: 0 }} />
                    <span style={{ fontSize: '1rem', color: 'var(--text-body)' }}>{feature}</span>
                  </div>
                ))}
              </div>
            </div>

            {/* Mobile Screenshot */}
            <div
              style={{
                display: 'flex',
                justifyContent: 'center',
                alignItems: 'center',
              }}
            >
              <div
                style={{
                  maxWidth: '320px',
                  borderRadius: '24px',
                  overflow: 'hidden',
                  border: '1px solid var(--border-light)',
                  boxShadow: '0 20px 40px rgba(0, 0, 0, 0.1)',
                  background: 'white',
                }}
              >
                <img
                  src="https://customer-assets.emergentagent.com/job_0cb1f9a2-4609-4da6-8470-d381af0fb9b3/artifacts/52q9md9i_image.png"
                  alt="Mirra Mobile App"
                  style={{
                    width: '100%',
                    height: 'auto',
                    display: 'block',
                  }}
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      <style>{`
        @media (max-width: 768px) {
          .product-showcase-mobile-grid {
            grid-template-columns: 1fr;
          }
        }
      `}</style>
    </section>
  );
};

export default ProductShowcase;
