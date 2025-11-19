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
            gridTemplateColumns: '1fr',
            gap: '3rem',
            alignItems: 'center',
          }}
        >
          {/* Hero Content */}
          <div style={{ textAlign: 'center', maxWidth: '900px', margin: '0 auto' }}>
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
                maxWidth: '700px',
                margin: '0 auto 2.5rem',
              }}
            >
              Catat penjualan, kelola stok, dan terima pembayaran QRIS dalam satu aplikasi.
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
                marginTop: '4rem',
                display: 'flex',
                gap: '3rem',
                justifyContent: 'center',
                flexWrap: 'wrap',
              }}
            >
              <div style={{ textAlign: 'center' }}>
                <div
                  style={{
                    fontSize: '2rem',
                    fontWeight: '700',
                    color: 'var(--color-secondary)',
                    marginBottom: '0.5rem',
                  }}
                >
                  1000+
                </div>
                <div style={{ fontSize: '0.875rem', color: 'var(--text-secondary)' }}>
                  UMKM Terdaftar
                </div>
              </div>
              <div style={{ textAlign: 'center' }}>
                <div
                  style={{
                    fontSize: '2rem',
                    fontWeight: '700',
                    color: 'var(--color-secondary)',
                    marginBottom: '0.5rem',
                  }}
                >
                  24/7
                </div>
                <div style={{ fontSize: '0.875rem', color: 'var(--text-secondary)' }}>
                  Dukungan Pelanggan
                </div>
              </div>
              <div style={{ textAlign: 'center' }}>
                <div
                  style={{
                    fontSize: '2rem',
                    fontWeight: '700',
                    color: 'var(--color-secondary)',
                    marginBottom: '0.5rem',
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
        </div>
      </div>
    </section>
  );
};

export default HeroSection;