import React, { useState, useEffect } from 'react';
import { Menu, X } from 'lucide-react';

const Navbar = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const scrollToSection = (sectionId) => {
    const element = document.getElementById(sectionId);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
      setIsMobileMenuOpen(false);
    }
  };

  return (
    <nav
      style={{
        position: 'fixed',
        top: 0,
        left: 0,
        right: 0,
        zIndex: 50,
        background: isScrolled ? 'rgba(255, 255, 255, 0.95)' : 'transparent',
        backdropFilter: isScrolled ? 'blur(16px)' : 'none',
        borderBottom: isScrolled ? '1px solid var(--border-light)' : 'none',
        transition: 'all 0.3s ease',
      }}
    >
      <div className="container" style={{ padding: '1rem 1.5rem' }}>
        <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
          {/* Logo */}
          <div style={{ display: 'flex', alignItems: 'center', gap: '12px' }}>
            <img
              src="https://customer-assets.emergentagent.com/job_0cb1f9a2-4609-4da6-8470-d381af0fb9b3/artifacts/ib5ee0th_Mirra%20Icon%20Play%20store.png"
              alt="Mirra Logo"
              style={{ height: '40px', width: 'auto' }}
            />
            <span style={{ fontSize: '1.5rem', fontWeight: '700', color: 'var(--text-primary)' }}>
              Mirra
            </span>
          </div>

          {/* Desktop Navigation */}
          <div
            style={{
              display: 'flex',
              alignItems: 'center',
              gap: '2rem',
            }}
            className="desktop-nav"
          >
            <button
              onClick={() => scrollToSection('tentang')}
              style={{
                background: 'none',
                border: 'none',
                color: 'var(--text-secondary)',
                fontSize: '1rem',
                fontWeight: '500',
                cursor: 'pointer',
                transition: 'color 0.2s ease',
              }}
              onMouseEnter={(e) => (e.target.style.color = 'var(--color-secondary)')}
              onMouseLeave={(e) => (e.target.style.color = 'var(--text-secondary)')}
            >
              Tentang
            </button>
            <button
              onClick={() => scrollToSection('fitur')}
              style={{
                background: 'none',
                border: 'none',
                color: 'var(--text-secondary)',
                fontSize: '1rem',
                fontWeight: '500',
                cursor: 'pointer',
                transition: 'color 0.2s ease',
              }}
              onMouseEnter={(e) => (e.target.style.color = 'var(--color-secondary)')}
              onMouseLeave={(e) => (e.target.style.color = 'var(--text-secondary)')}
            >
              Fitur
            </button>
            <button
              onClick={() => scrollToSection('keunggulan')}
              style={{
                background: 'none',
                border: 'none',
                color: 'var(--text-secondary)',
                fontSize: '1rem',
                fontWeight: '500',
                cursor: 'pointer',
                transition: 'color 0.2s ease',
              }}
              onMouseEnter={(e) => (e.target.style.color = 'var(--color-secondary)')}
              onMouseLeave={(e) => (e.target.style.color = 'var(--text-secondary)')}
            >
              Keunggulan
            </button>
            <a
              href="https://pos.digi-nest.my.id/signup"
              className="btn-primary"
              style={{ padding: '10px 24px', minHeight: '44px' }}
            >
              Daftar Sekarang
            </a>
          </div>

          {/* Mobile Menu Button */}
          <button
            onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
            style={{
              background: 'none',
              border: 'none',
              cursor: 'pointer',
              display: 'none',
            }}
            className="mobile-menu-btn"
          >
            {isMobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>

        {/* Mobile Menu */}
        {isMobileMenuOpen && (
          <div
            style={{
              display: 'none',
              flexDirection: 'column',
              gap: '1rem',
              paddingTop: '1.5rem',
            }}
            className="mobile-menu"
          >
            <button
              onClick={() => scrollToSection('tentang')}
              style={{
                background: 'none',
                border: 'none',
                color: 'var(--text-secondary)',
                fontSize: '1rem',
                fontWeight: '500',
                cursor: 'pointer',
                padding: '0.5rem',
                textAlign: 'left',
              }}
            >
              Tentang
            </button>
            <button
              onClick={() => scrollToSection('fitur')}
              style={{
                background: 'none',
                border: 'none',
                color: 'var(--text-secondary)',
                fontSize: '1rem',
                fontWeight: '500',
                cursor: 'pointer',
                padding: '0.5rem',
                textAlign: 'left',
              }}
            >
              Fitur
            </button>
            <button
              onClick={() => scrollToSection('keunggulan')}
              style={{
                background: 'none',
                border: 'none',
                color: 'var(--text-secondary)',
                fontSize: '1rem',
                fontWeight: '500',
                cursor: 'pointer',
                padding: '0.5rem',
                textAlign: 'left',
              }}
            >
              Keunggulan
            </button>
            <a
              href="https://pos.digi-nest.my.id/signup"
              className="btn-primary"
              style={{ width: '100%' }}
            >
              Daftar Sekarang
            </a>
          </div>
        )}
      </div>

      <style>{`
        @media (max-width: 768px) {
          .desktop-nav {
            display: none !important;
          }
          .mobile-menu-btn {
            display: block !important;
          }
          .mobile-menu {
            display: flex !important;
          }
        }
      `}</style>
    </nav>
  );
};

export default Navbar;