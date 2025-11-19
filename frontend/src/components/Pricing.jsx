import React from 'react';
import { Check, Crown, Sparkles, Zap } from 'lucide-react';

const Pricing = () => {
  const plans = [
    {
      name: 'Basic',
      price: 'GRATIS',
      period: 'Selamanya',
      description: 'Sempurna untuk memulai bisnis UMKM Anda',
      features: [
        '1 Cabang',
        '50 Produk per cabang',
        'Laporan dasar',
        'Aplikasi kasir mobile',
        'Dukungan email',
      ],
      icon: Zap,
      color: 'var(--color-secondary)',
      bgGradient: 'linear-gradient(135deg, rgba(0, 168, 232, 0.1), rgba(0, 168, 232, 0.05))',
      borderColor: 'rgba(0, 168, 232, 0.3)',
      buttonStyle: 'secondary',
      popular: false,
    },
    {
      name: 'Advance',
      price: 'Rp 10.000',
      period: 'per bulan',
      description: 'Untuk bisnis yang berkembang dengan kebutuhan lebih',
      features: [
        '2 Cabang',
        '100 Produk per cabang',
        'Laporan lengkap',
        'Manajemen karyawan',
        'Integrasi QRIS',
        'Dukungan prioritas',
      ],
      icon: Sparkles,
      color: 'var(--color-primary)',
      bgGradient: 'linear-gradient(135deg, rgba(255, 193, 7, 0.15), rgba(255, 193, 7, 0.05))',
      borderColor: 'var(--color-primary)',
      buttonStyle: 'primary',
      popular: true,
    },
    {
      name: 'Premium',
      price: 'Rp 30.000',
      period: 'per bulan',
      description: 'Solusi lengkap untuk bisnis multi-cabang',
      features: [
        '10 Cabang',
        'Produk Tidak Terbatas',
        'Laporan advanced & analytics',
        'Multi pengguna unlimited',
        'Akuntansi terintegrasi',
        'Dukungan 24/7 dedicated',
        'Akses API',
      ],
      icon: Crown,
      color: 'var(--color-primary)',
      bgGradient: 'linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(0, 168, 232, 0.1))',
      borderColor: 'var(--color-primary)',
      buttonStyle: 'primary',
      popular: false,
    },
  ];

  return (
    <section id="harga" className="section section-alt">
      <div className="container">
        {/* Section Header */}
        <div style={{ textAlign: 'center', marginBottom: '4rem' }}>
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
            <Crown size={16} style={{ color: 'var(--color-primary)' }} />
            <span
              style={{
                fontSize: '0.875rem',
                fontWeight: '600',
                color: 'var(--color-primary-dark)',
              }}
            >
              Paket Langganan
            </span>
          </div>
          <h2 className="heading-2" style={{ marginBottom: '1rem' }}>
            Pilih Paket yang Sesuai
            <br />
            untuk Bisnis Anda
          </h2>
          <p className="body-large" style={{ color: 'var(--text-secondary)', maxWidth: '600px', margin: '0 auto' }}>
            Harga terjangkau dengan fitur lengkap untuk UMKM Indonesia
          </p>
        </div>

        {/* Pricing Cards */}
        <div
          style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))',
            gap: '2rem',
            maxWidth: '1200px',
            margin: '0 auto',
          }}
        >
          {plans.map((plan, index) => {
            const IconComponent = plan.icon;
            return (
              <div
                key={index}
                style={{
                  background: plan.bgGradient,
                  border: `2px solid ${plan.borderColor}`,
                  borderRadius: '20px',
                  padding: '2.5rem',
                  position: 'relative',
                  transition: 'all 0.3s ease',
                  display: 'flex',
                  flexDirection: 'column',
                  height: '100%',
                }}
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = 'translateY(-8px)';
                  e.currentTarget.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.12)';
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = 'translateY(0)';
                  e.currentTarget.style.boxShadow = 'none';
                }}
              >
                {/* Popular Badge */}
                {plan.popular && (
                  <div
                    style={{
                      position: 'absolute',
                      top: '-12px',
                      right: '20px',
                      background: 'var(--gradient-button)',
                      color: 'white',
                      padding: '6px 16px',
                      borderRadius: '9999px',
                      fontSize: '0.75rem',
                      fontWeight: '700',
                      boxShadow: '0 4px 12px rgba(255, 193, 7, 0.4)',
                    }}
                  >
                    PALING POPULER
                  </div>
                )}

                {/* Icon */}
                <div
                  style={{
                    width: '64px',
                    height: '64px',
                    borderRadius: '16px',
                    background: plan.color === 'var(--color-primary)'
                      ? 'linear-gradient(135deg, rgba(255, 193, 7, 0.3), rgba(255, 193, 7, 0.1))'
                      : 'linear-gradient(135deg, rgba(0, 168, 232, 0.3), rgba(0, 168, 232, 0.1))',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    marginBottom: '1.5rem',
                  }}
                >
                  <IconComponent size={32} style={{ color: plan.color }} />
                </div>

                {/* Plan Name */}
                <h3 className="heading-3" style={{ marginBottom: '0.5rem', fontSize: '1.5rem' }}>
                  {plan.name}
                </h3>

                {/* Description */}
                <p style={{ fontSize: '0.95rem', color: 'var(--text-secondary)', marginBottom: '1.5rem' }}>
                  {plan.description}
                </p>

                {/* Price */}
                <div style={{ marginBottom: '2rem' }}>
                  <div
                    style={{
                      fontSize: '2.5rem',
                      fontWeight: '700',
                      color: 'var(--text-primary)',
                      lineHeight: '1',
                      marginBottom: '0.25rem',
                    }}
                  >
                    {plan.price}
                  </div>
                  <div style={{ fontSize: '0.95rem', color: 'var(--text-secondary)' }}>
                    {plan.period}
                  </div>
                </div>

                {/* Features List */}
                <div style={{ flex: 1, marginBottom: '2rem' }}>
                  <ul style={{ listStyle: 'none', padding: 0, display: 'flex', flexDirection: 'column', gap: '1rem' }}>
                    {plan.features.map((feature, idx) => (
                      <li key={idx} style={{ display: 'flex', alignItems: 'flex-start', gap: '0.75rem' }}>
                        <Check
                          size={20}
                          style={{
                            color: plan.color,
                            flexShrink: 0,
                            marginTop: '2px',
                          }}
                        />
                        <span style={{ fontSize: '0.95rem', color: 'var(--text-body)', lineHeight: '1.5' }}>
                          {feature}
                        </span>
                      </li>
                    ))}
                  </ul>
                </div>

                {/* CTA Button */}
                <a
                  href="https://pos.digi-nest.my.id/signup"
                  className={plan.buttonStyle === 'primary' ? 'btn-primary' : 'btn-secondary'}
                  style={{
                    width: '100%',
                    textAlign: 'center',
                    fontSize: '1rem',
                  }}
                >
                  {plan.price === 'GRATIS' ? 'Mulai Gratis' : 'Pilih Paket'}
                </a>
              </div>
            );
          })}
        </div>

        {/* Bottom Note */}
        <div
          style={{
            textAlign: 'center',
            marginTop: '3rem',
            padding: '2rem',
            background: 'rgba(0, 168, 232, 0.05)',
            borderRadius: '16px',
            border: '1px solid rgba(0, 168, 232, 0.1)',
          }}
        >
          <p style={{ fontSize: '1rem', color: 'var(--text-body)', marginBottom: '0.5rem', fontWeight: '500' }}>
            Tidak ada biaya tersembunyi • Batalkan kapan saja • Upgrade/downgrade fleksibel
          </p>
          <p style={{ fontSize: '0.95rem', color: 'var(--text-secondary)', margin: 0 }}>
            Semua paket sudah termasuk update gratis dan dukungan teknis
          </p>
        </div>
      </div>
    </section>
  );
};

export default Pricing;
