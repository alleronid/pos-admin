import React from 'react';
import { ArrowRight, Play } from 'lucide-react';

const HeroSection = () => {
  return (
    <section
      style={{
        background: 'var(--gradient-hero)',
        minHeight: '100vh',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        padding: '8rem 1.5rem 4rem',
        position: 'relative',
        overflow: 'hidden',
      }}
    >
      <div className="container">
        <div
          style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fit, minmax(450px, 1fr))',
            gap: '4rem',
            alignItems: 'center',
          }}
          className="hero-grid"
        >
          {/* Hero Content */}
          <div>
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
                }}
              />
              <span
                style={{
                  fontSize: '0.875rem',
                  fontWeight: '600',
                  color: 'var(--color-secondary-dark)',
                }}
              >
                Solusi POS untuk UMKM Indonesia
              </span>
            </div>

            {/* Main Headline */}
            <h1
              className="heading-1 animate-fade-in-up"
              style={{
                marginBottom: '1.5rem',
              }}
            >
              POS Sederhana untuk <br />
              <span
                style={{
                  background: 'linear-gradient(135deg, var(--color-primary), var(--color-secondary))',
                  WebkitBackgroundClip: 'text',
                  WebkitTextFillColor: 'transparent',
                  backgroundClip: 'text',
                }}
              >
                UMKM Indonesia
              </span>
              <br />
              Cepat, Mudah, Terjangkau.
            </h1>

            {/* Sub-headline */}
            <p
              className="body-large"
              style={{
                marginBottom: '2.5rem',
                color: 'var(--text-secondary)',
              }}
            >
              Catat penjualan, kelola stok, dan terima pembayaran QRIS dalam satu aplikasi.
            </p>

            {/* CTA Buttons */}
            <div
              style={{
                display: 'flex',
                gap: '1rem',
                flexWrap: 'wrap',
                marginBottom: '3rem',
              }}
            >
              <a href="https://pos.digi-nest.my.id/signup" className="btn-primary">
                Daftar Sekarang
                <ArrowRight size={20} />
              </a>
              <a
                href="#fitur"
                className="btn-secondary"
                onClick={(e) => {
                  e.preventDefault();
                  document.getElementById('fitur')?.scrollIntoView({ behavior: 'smooth' });
                }}
              >
                <Play size={20} />
                Lihat Demo
              </a>
            </div>

            {/* Trust Indicators */}
            <div
              style={{
                display: 'flex',
                gap: '2.5rem',
                flexWrap: 'wrap',
              }}
            >
              <div>
                <div
                  style={{
                    fontSize: '2rem',
                    fontWeight: '700',
                    color: 'var(--color-secondary)',
                    marginBottom: '0.25rem',
                  }}
                >
                  1000+
                </div>
                <div style={{ fontSize: '0.875rem', color: 'var(--text-secondary)' }}>
                  UMKM Terdaftar
                </div>
              </div>
              <div>
                <div
                  style={{
                    fontSize: '2rem',
                    fontWeight: '700',
                    color: 'var(--color-secondary)',
                    marginBottom: '0.25rem',
                  }}
                >
                  24/7
                </div>
                <div style={{ fontSize: '0.875rem', color: 'var(--text-secondary)' }}>
                  Dukungan Pelanggan
                </div>
              </div>
              <div>
                <div
                  style={{
                    fontSize: '2rem',
                    fontWeight: '700',
                    color: 'var(--color-secondary)',
                    marginBottom: '0.25rem',
                  }}
                >
                  99.9%
                </div>
                <div style={{ fontSize: '0.875rem', color: 'var(--text-secondary)' }}>
                  Uptime Aplikasi
                </div>
              </div>
            </div>
          </div>

          {/* Hero Image */}
          <div
            style={{
              position: 'relative',
              display: 'flex',
              justifyContent: 'center',
              alignItems: 'center',
            }}
          >
            <div
              style={{
                position: 'relative',
                borderRadius: '20px',
                overflow: 'hidden',
                boxShadow: '0 20px 60px rgba(0, 0, 0, 0.15)',
                border: '1px solid var(--border-light)',
              }}
            >
              <img
                src="https://images.unsplash.com/photo-1728044849291-69f90d443aea"
                alt="Mirra POS System"
                style={{
                  width: '100%',
                  height: 'auto',
                  display: 'block',
                  maxWidth: '550px',
                }}
              />
              {/* Mirra logo overlay */}
              <div
                style={{
                  position: 'absolute',
                  bottom: '1.5rem',
                  right: '1.5rem',
                  background: 'rgba(255, 255, 255, 0.95)',
                  padding: '0.75rem 1.25rem',
                  borderRadius: '12px',
                  backdropFilter: 'blur(8px)',
                  boxShadow: '0 4px 12px rgba(0, 0, 0, 0.1)',
                }}
              >
                <img
                  src="https://customer-assets.emergentagent.com/job_0cb1f9a2-4609-4da6-8470-d381af0fb9b3/artifacts/1vv6e1dw_Untitled%20design%20%2836%29.png"
                  alt="Mirra"
                  style={{ height: '32px', width: 'auto' }}
                />
              </div>
            </div>
            
            {/* Decorative elements */}
            <div
              style={{
                position: 'absolute',
                top: '-20px',
                right: '-20px',
                width: '120px',
                height: '120px',
                borderRadius: '50%',
                background: 'linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(0, 168, 232, 0.2))',
                filter: 'blur(40px)',
                zIndex: -1,
              }}
            />
            <div
              style={{
                position: 'absolute',
                bottom: '-30px',
                left: '-30px',
                width: '150px',
                height: '150px',
                borderRadius: '50%',
                background: 'linear-gradient(135deg, rgba(0, 168, 232, 0.2), rgba(255, 193, 7, 0.2))',
                filter: 'blur(50px)',
                zIndex: -1,
              }}
            />
          </div>
        </div>
      </div>
      
      <style>{`
        @media (max-width: 968px) {
          .hero-grid {
            grid-template-columns: 1fr !important;
            text-align: center;
          }
          .hero-grid > div:first-child {
            order: 2;
          }
          .hero-grid > div:last-child {
            order: 1;
          }
        }
      `}</style>
    </section>
  );
};

export default HeroSection;