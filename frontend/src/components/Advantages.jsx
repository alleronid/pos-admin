import React from 'react';
import { DollarSign, Smartphone, GraduationCap, Headphones, TrendingDown, CheckCircle } from 'lucide-react';

const Advantages = () => {
  const advantages = [
    {
      icon: DollarSign,
      title: 'MDR Kompetitif',
      description: 'Biaya transaksi yang ramah untuk UMKM, tidak membebani usaha Anda',
    },
    {
      icon: Smartphone,
      title: 'Tampilan Sederhana',
      description: 'Interface yang intuitif dan mudah dipahami untuk semua kalangan',
    },
    {
      icon: GraduationCap,
      title: 'Tanpa Training',
      description: 'Langsung bisa digunakan tanpa perlu pelatihan khusus',
    },
    {
      icon: Headphones,
      title: 'Layanan Cepat',
      description: 'Tim customer service kami siap membantu Anda 24/7',
    },
    {
      icon: TrendingDown,
      title: 'Biaya Rendah',
      description: 'Harga langganan yang terjangkau untuk semua jenis UMKM',
    },
    {
      icon: CheckCircle,
      title: 'Stabil & Aman',
      description: 'Teknologi yang handal dengan keamanan data terjamin',
    },
  ];

  return (
    <section id="keunggulan" className="section section-alt">
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
            <CheckCircle size={16} style={{ color: 'var(--color-secondary)' }} />
            <span
              style={{
                fontSize: '0.875rem',
                fontWeight: '600',
                color: 'var(--color-secondary-dark)',
              }}
            >
              Keunggulan Kami
            </span>
          </div>
          <h2 className="heading-2" style={{ marginBottom: '1rem' }}>
            Mengapa Memilih Mirra?
          </h2>
          <p className="body-large" style={{ color: 'var(--text-secondary)', maxWidth: '600px', margin: '0 auto' }}>
            Keunggulan yang membuat Mirra menjadi pilihan terbaik untuk UMKM Indonesia
          </p>
        </div>

        {/* Advantages Grid */}
        <div
          style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fit, minmax(280px, 1fr))',
            gap: '2rem',
          }}
        >
          {advantages.map((advantage, index) => {
            const IconComponent = advantage.icon;
            return (
              <div
                key={index}
                style={{
                  background: 'var(--bg-card)',
                  borderRadius: '16px',
                  padding: '2rem',
                  border: '1px solid var(--border-light)',
                  transition: 'all 0.3s ease',
                  display: 'flex',
                  flexDirection: 'column',
                  gap: '1rem',
                }}
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = 'translateY(-4px)';
                  e.currentTarget.style.boxShadow = '0 8px 24px rgba(0, 0, 0, 0.08)';
                  e.currentTarget.style.borderColor = 'rgba(0, 168, 232, 0.3)';
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = 'translateY(0)';
                  e.currentTarget.style.boxShadow = 'none';
                  e.currentTarget.style.borderColor = 'var(--border-light)';
                }}
              >
                <div
                  style={{
                    width: '56px',
                    height: '56px',
                    borderRadius: '12px',
                    background:
                      index % 2 === 0
                        ? 'linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(255, 193, 7, 0.1))'
                        : 'linear-gradient(135deg, rgba(0, 168, 232, 0.2), rgba(0, 168, 232, 0.1))',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                  }}
                >
                  <IconComponent
                    size={28}
                    style={{ color: index % 2 === 0 ? 'var(--color-primary)' : 'var(--color-secondary)' }}
                  />
                </div>
                <div>
                  <h3 className="heading-3" style={{ marginBottom: '0.5rem', fontSize: '1.125rem' }}>
                    {advantage.title}
                  </h3>
                  <p style={{ fontSize: '0.95rem', color: 'var(--text-secondary)', margin: 0 }}>
                    {advantage.description}
                  </p>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
};

export default Advantages;