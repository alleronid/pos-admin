import React from 'react';
import './App.css';
import Navbar from './components/Navbar';
import HeroSection from './components/HeroSection';
import BrandStory from './components/BrandStory';
import Features from './components/Features';
import ProductShowcase from './components/ProductShowcase';
import TargetMarket from './components/TargetMarket';
import Advantages from './components/Advantages';
import CTASection from './components/CTASection';
import Footer from './components/Footer';

function App() {
  return (
    <div className="App">
      <Navbar />
      <HeroSection />
      <BrandStory />
      <Features />
      <ProductShowcase />
      <TargetMarket />
      <Advantages />
      <CTASection />
      <Footer />
    </div>
  );
}

export default App;