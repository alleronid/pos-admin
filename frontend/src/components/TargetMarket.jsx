import React from 'react';
import { Store, Coffee, ShoppingBag, UtensilsCrossed } from 'lucide-react';

const TargetMarket = () => {
  const markets = [
    {
      icon: Store,
      title: 'Toko Kelontong',
      description: 'Warung sembako dan mini groceries',
      gradient: 'linear-gradient(135deg, rgba(0, 168, 232, 0.1), rgba(0, 168, 232, 0.05))',
      iconBg: 'linear-gradient(135deg, rgba(0, 168, 232, 0.2), rgba(0, 168, 232, 0.1))',
      color: 'var(--color-secondary)',
    },
    {
      icon: Coffee,
      title: 'Kafe & Kedai Kopi',
      description: 'Kedai kopi rumahan dan kafe kecil',
      gradient: 'linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.05))',
      iconBg: 'linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(255, 193, 7, 0.1))',
      color: 'var(--color-primary)',
    },
    {
      icon: UtensilsCrossed,
      title: 'Warung Makan',
      description: 'F&B kecil dan usaha makanan',
      gradient: 'linear-gradient(135deg, rgba(0, 168, 232, 0.1), rgba(0, 168, 232, 0.05))',
      iconBg: 'linear-gradient(135deg, rgba(0, 168, 232, 0.2), rgba(0, 168, 232, 0.1))',
      color: 'var(--color-secondary)',
    },
    {
      icon: ShoppingBag,
      title: 'Usaha Kecil Lainnya',
      description: 'Berbagai jenis UMKM Indonesia',
      gradient: 'linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.05))',
      iconBg: 'linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(255, 193, 7, 0.1))',
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
                  background: 'var(--bg-card)',
                  borderRadius: '16px',
                  overflow: 'hidden',
                  border: '1px solid var(--border-light)',
                  transition: 'all 0.3s ease',
                  cursor: 'pointer',
                }}
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = 'translateY(-4px)';
                  e.currentTarget.style.boxShadow = '0 8px 24px rgba(0, 0, 0, 0.08)';
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = 'translateY(0)';
                  e.currentTarget.style.boxShadow = 'none';
                }}
              >
                {/* Image */}
                <div
                  style={{
                    width: '100%',
                    height: '200px',
                    overflow: 'hidden',
                    position: 'relative',
                  }}
                >
                  <img
                    src={market.image}
                    alt={market.title}
                    style={{
                      width: '100%',
                      height: '100%',
                      objectFit: 'cover',
                      transition: 'transform 0.3s ease',
                    }}
                    onMouseEnter={(e) => {
                      e.currentTarget.style.transform = 'scale(1.05)';
                    }}
                    onMouseLeave={(e) => {
                      e.currentTarget.style.transform = 'scale(1)';
                    }}
                  />
                  <div
                    style={{
                      position: 'absolute',
                      top: '1rem',
                      left: '1rem',
                      width: '48px',
                      height: '48px',
                      borderRadius: '12px',
                      background: 'rgba(255, 255, 255, 0.95)',
                      display: 'flex',
                      alignItems: 'center',
                      justifyContent: 'center',
                      backdropFilter: 'blur(8px)',
                    }}
                  >
                    <IconComponent size={24} style={{ color: 'var(--color-secondary)' }} />
                  </div>
                </div>

                {/* Content */}
                <div style={{ padding: '1.5rem' }}>
                  <h3 className="heading-3" style={{ marginBottom: '0.5rem', fontSize: '1.125rem' }}>
                    {market.title}
                  </h3>
                  <p style={{ fontSize: '0.95rem', color: 'var(--text-secondary)', margin: 0 }}>
                    {market.description}
                  </p>
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