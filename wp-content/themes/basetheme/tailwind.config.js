module.exports = {
  content: [
    "./*.php", 
    "./templates/**/*.php",
    "./woocommerce/**/*.php", 
    "./includes/basetheme-blocks-handler/**/*.php", 
  ],
  safelist: [
    'underline', 'max-h-0', 'max-h-overmax', 'text-4xl', 'flex', 'flex-wrap', 'items-center', 'justify-between',
    { // all margins
      pattern: /^\-?m(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'], 
    }, 
    { // all paddings
      pattern: /^p(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    { // all width
      pattern: /^w(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    { // all height
      pattern: /^h(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1.25rem',
        md: '2.5rem',
        lg: '2.5rem',
        xl: '2.5rem',
      },
    },
    extend: {
      colors: {
        "d-black": "#2B2B2B",
        "l-black": "#3B3B3B",
        "primary": "#A259FF",
        "l-gray": "#CCCCCC",
      },
      fontSize: {
        'xxxs': ['10px', { //10px
          lineHeight: '16px',
        }],
        'xxs': ['0.813rem', { //13px
          lineHeight: '20px',
        }],
      },
      lineHeight: {
        '54': '54px',
      },
      padding: {
        'px-0.5': '0.5px',
      },
      minWidth: {
        '500px': '500px',
      },
      maxWidth: {
        '100px': '100px',
      },
      height: {
        '500': '500px',
      },
      minHeight: {
        '500': '500px',
      },
      maxHeight: {
        '20vh': '20vh',
      },
      zIndex: {
        '-3': '-3',
        '-2': '-2',
        '-1': '-1',
      },
      boxShadow: {
        'mega-menu': '0px 22px 14px -6px rgba(24, 39, 75, 0.12)',
      },
    },
  },
  plugins: [],
};