import React from 'react';
import { ArrowRight, MessageCircle } from 'lucide-react';

const CTASection = () => {
  return (
    <section
      className="section"
      style={{
        background: 'var(--gradient-hero)',
        position: 'relative',
        overflow: 'hidden',
      }}
    >
      <div className="container">
        <div
          style={{
            maxWidth: '800px',
            margin: '0 auto',
            textAlign: 'center',
            position: 'relative',
            zIndex: 2,
          }}
        >
          {/* Badge */}
          <div
            style={{
              display: 'inline-flex',
              alignItems: 'center',
              gap: '8px',
              background: 'rgba(0, 168, 232, 0.1)',
              border: '1px solid rgba(0, 168, 232, 0.2)',
              borderRadius: '9999px',
              padding: '8px 20px',
              marginBottom: '2rem',
            }}
          >
            <span
              style={{
                width: '8px',
                height: '8px',
                borderRadius: '50%',
                background: 'var(--color-secondary)',
                animation: 'pulse 2s ease-in-out infinite',
              }}
            />
            <span
              style={{
                fontSize: '0.875rem',
                fontWeight: '600',
                color: 'var(--color-secondary-dark)',
              }}
            >
              Siap Memulai?
            </span>
          </div>

          <h2 className="heading-2" style={{ marginBottom: '1.5rem' }}>
            Mulai Digitalisasi
            <br />
            <span
              style={{
                background: 'linear-gradient(135deg, var(--color-primary), var(--color-secondary))',
                WebkitBackgroundClip: 'text',
                WebkitTextFillColor: 'transparent',
                backgroundClip: 'text',
              }}
            >
              Usaha Anda Sekarang
            </span>
          </h2>

          <p
            className="body-large"
            style={{
              color: 'var(--text-secondary)',
              marginBottom: '2.5rem',
            }}
          >
            Bergabunglah dengan ribuan UMKM Indonesia yang telah merasakan kemudahan Mirra.
            Daftar gratis dan rasakan perbedaannya.
          </p>

          {/* CTA Buttons */}
          <div
            style={{
              display: 'flex',
              gap: '1rem',
              justifyContent: 'center',
              flexWrap: 'wrap',
            }}
          >
            <a
              href="https://pos.digi-nest.my.id/signup"
              className="btn-primary"
              style={{ fontSize: '1.125rem', padding: '16px 40px' }}
            >
              Daftar Sekarang
              <ArrowRight size={22} />
            </a>
            <button
              className="btn-secondary"
              style={{ fontSize: '1.125rem', padding: '14px 40px' }}
              onClick={() => {
                window.open('https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Mirra%20POS', '_blank');
              }}
            >
              <MessageCircle size={22} />
              Konsultasi Gratis
            </button>
          </div>

          {/* Trust Message */}
          <p
            style={{
              marginTop: '2rem',
              fontSize: '0.875rem',
              color: 'var(--text-muted)',
            }}
          >
            Tanpa biaya tersembunyi • Gratis 14 hari trial • Bisa berhenti kapan saja
          </p>
        </div>
      </div>

      <style>{`
        @keyframes pulse {
          0%, 100% {
            opacity: 1;
          }
          50% {
            opacity: 0.5;
          }
        }
      `}</style>
    </section>
  );
};

export default CTASection;