import React from 'react';
import ReactDOM from 'react-dom';
import App from './App.jsx';

require('../css/app.css');

window.startApp = (enterUrl, positions) => {
    ReactDOM.render(<App enterUrl={enterUrl} positions={positions} />,
    document.querySelector('#app'));
};
