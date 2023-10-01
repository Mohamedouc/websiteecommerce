import React, { useState } from 'react';

function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [message, setMessage] = useState('');

  function handleSubmit(e) {
    e.preventDefault();

    fetch('/login', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email, password })
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        // Login successful
        console.log('Logged in!');
      } else {
        // Login failed
        setMessage(data.message);
      }
    })
    .catch(err => console.log(err));
  }

  return (
    <div id="Login">
      <form onSubmit={handleSubmit}>
        <div className="input-group">
          <input 
            type="email" 
            name="email" 
            placeholder="Email" 
            value={email}
            onChange={e => setEmail(e.target.value)}
            required  
          />
          <input 
            type="password" 
            name="password" 
            placeholder="Password"
            value={password}
            onChange={e => setPassword(e.target.value)}
            required  
          />
        </div>
        <button type="submit">Login</button>
      </form>
      {message && <p>{message}</p>}
    </div>
  );
}