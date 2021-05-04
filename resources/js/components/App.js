import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import MyPage from './MyPage';
import ConditionList from './ConditionList';

function App() {
    return (
        <div>
        <h1>hello</h1>
        </div>
    )
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
