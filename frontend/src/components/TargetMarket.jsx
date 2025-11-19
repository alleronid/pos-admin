import React from 'react';
import { Store, Coffee, ShoppingBag, UtensilsCrossed } from 'lucide-react';

const TargetMarket = () => {
  const markets = [
    {
      icon: Store,
      title: 'Toko Kelontong',
      description: 'Warung sembako dan mini groceries',
      image: 'https://images.unsplash.com/photo-1633949970272-3421a17b5e32?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzh8MHwxfHNlYXJjaHwyfHxzbWFsbCUyMGdyb2NlcnklMjBzdG9yZXxlbnwwfHx8fDE3NjM1NDM5NzB8MA&ixlib=rb-4.1.0&q=85',
      color: 'var(--color-secondary)',
    },
    {
      icon: Coffee,
      title: 'Kafe & Kedai Kopi',
      description: 'Kedai kopi rumahan dan kafe kecil',
      image: 'https://images.unsplash.com/photo-1453614512568-c4024d13c247?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDk1ODF8MHwxfHNlYXJjaHwxfHxjb2ZmZWUlMjBzaG9wfGVufDB8fHx8MTc2MzU0Mzk3NXww&ixlib=rb-4.1.0&q=85',
      color: 'var(--color-primary)',
    },
    {
      icon: UtensilsCrossed,
      title: 'Warung Makan',
      description: 'F&B kecil dan usaha makanan',
      image: 'https://images.unsplash.com/photo-1643886024293-b5d3d6bf92b2?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDk1Nzh8MHwxfHNlYXJjaHwyfHx3YXJ1bmd8ZW58MHx8fHwxNzYzNTQzOTkzfDA&ixlib=rb-4.1.0&q=85',
      color: 'var(--color-secondary)',
    },
    {
      icon: ShoppingBag,
      title: 'Usaha Kecil Lainnya',
      description: 'Berbagai jenis UMKM Indonesia',
      image: 'https://images.unsplash.com/photo-1556740758-90de374c12ad?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzh8MHwxfHNlYXJjaHwyfHxzbWFsbCUyMGJ1c2luZXNzfGVufDB8fHx8MTc2MzU0Mzk4NXww&ixlib=rb-4.1.0&q=85',
      color: 'var(--color-primary)',
    },
  ];

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
              background: 'rgba(255, 193, 7, 0.1)',
              border: '1px solid rgba(255, 193, 7, 0.3)',
              borderRadius: '9999px',
              padding: '6px 16px',
              marginBottom: '1.5rem',
            }}
          >
            <Store size={16} style={{ color: 'var(--color-primary)' }} />
            <span
              style={{
                fontSize: '0.875rem',
                fontWeight: '600',
                color: 'var(--color-primary-dark)',
              }}
            >
              Target Market
            </span>
          </div>
          <h2 className="heading-2" style={{ marginBottom: '1rem' }}>
            Dibuat Khusus untuk
            <br />
            Usaha Kecil Indonesia
          </h2>
          <p className="body-large" style={{ color: 'var(--text-secondary)', maxWidth: '600px', margin: '0 auto' }}>
            Solusi teknologi yang dirancang untuk berbagai jenis UMKM di seluruh Indonesia
          </p>
        </div>

        {/* Market Grid */}
        <div
          style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fit, minmax(280px, 1fr))',
            gap: '2rem',
          }}
        >
          {markets.map((market, index) => {
            const IconComponent = market.icon;
            return (
              <div
                key={index}
                style={{
                  background: market.gradient,
                  borderRadius: '20px',
                  border: `2px solid ${market.color === 'var(--color-primary)' ? 'rgba(255, 193, 7, 0.3)' : 'rgba(0, 168, 232, 0.3)'}`,
                  padding: '2.5rem',
                  transition: 'all 0.3s ease',
                  cursor: 'pointer',
                  display: 'flex',
                  flexDirection: 'column',
                  alignItems: 'center',
                  textAlign: 'center',
                  position: 'relative',
                  overflow: 'hidden',
                }}
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = 'translateY(-8px)';
                  e.currentTarget.style.boxShadow = '0 12px 32px rgba(0, 0, 0, 0.1)';
                  e.currentTarget.style.borderColor = market.color;
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = 'translateY(0)';
                  e.currentTarget.style.boxShadow = 'none';
                  e.currentTarget.style.borderColor = market.color === 'var(--color-primary)' ? 'rgba(255, 193, 7, 0.3)' : 'rgba(0, 168, 232, 0.3)';
                }}
              >
                {/* Decorative background pattern */}
                <div
                  style={{
                    position: 'absolute',
                    top: '-50px',
                    right: '-50px',
                    width: '150px',
                    height: '150px',
                    borderRadius: '50%',
                    background: market.iconBg,
                    opacity: 0.3,
                    zIndex: 0,
                  }}
                />

                {/* Icon */}
                <div
                  style={{
                    width: '80px',
                    height: '80px',
                    borderRadius: '20px',
                    background: market.iconBg,
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    marginBottom: '1.5rem',
                    position: 'relative',
                    zIndex: 1,
                  }}
                >
                  <IconComponent size={40} style={{ color: market.color }} />
                </div>

                {/* Content */}
                <div style={{ position: 'relative', zIndex: 1 }}>
                  <h3 className="heading-3" style={{ marginBottom: '0.75rem', fontSize: '1.25rem' }}>
                    {market.title}
                  </h3>
                  <p style={{ fontSize: '1rem', color: 'var(--text-secondary)', margin: 0, lineHeight: '1.6' }}>
                    {market.description}
                  </p>
                </div>

                {/* Small Mirra logo at bottom */}
                <div
                  style={{
                    marginTop: '1.5rem',
                    opacity: 0.4,
                    position: 'relative',
                    zIndex: 1,
                  }}
                >
                  <img
                    src="https://customer-assets.emergentagent.com/job_0cb1f9a2-4609-4da6-8470-d381af0fb9b3/artifacts/1vv6e1dw_Untitled%20design%20%2836%29.png"
                    alt="Mirra"
                    style={{ height: '24px', width: 'auto' }}
                  />
                </div>
              </div>
            );
          })}
        </div>

        {/* Tagline */}
        <div
          style={{
            textAlign: 'center',
            marginTop: '4rem',
            padding: '2rem',
            background: 'linear-gradient(135deg, rgba(255, 193, 7, 0.05), rgba(0, 168, 232, 0.05))',
            borderRadius: '16px',
            border: '1px solid var(--border-light)',
          }}
        >
          <h3 className="heading-3" style={{ marginBottom: '0.5rem' }}>
            Solusi teknologi yang dibuat khusus untuk usaha kecil
          </h3>
          <p className="body-medium" style={{ color: 'var(--text-secondary)', margin: 0 }}>
            Mudah digunakan, terjangkau, dan mendukung pertumbuhan bisnis Anda
          </p>
        </div>
      </div>
    </section>
  );
};

export default TargetMarket;