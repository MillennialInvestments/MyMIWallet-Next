const transcript = document.getElementById('transcript');
const form = document.getElementById('chat-form');
const messageInput = document.getElementById('message');
const sendBtn = document.getElementById('send-btn');
const statusEl = document.getElementById('status');
const template = document.getElementById('message-template');

const conversation = [];

function addMessage(role, content) {
  const clone = template.content.firstElementChild.cloneNode(true);
  clone.classList.add(role);
  clone.querySelector('.role').textContent = role;
  clone.querySelector('.content').textContent = content;
  transcript.appendChild(clone);
  transcript.scrollTop = transcript.scrollHeight;
}

function setStatus(text, isError = false) {
  statusEl.textContent = text;
  statusEl.style.color = isError ? '#ef4444' : '#9ca3af';
}

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const content = messageInput.value.trim();
  if (!content) return;

  sendBtn.disabled = true;
  setStatus('Sending...');
  addMessage('user', content);
  conversation.push({ role: 'user', content });
  messageInput.value = '';

  try {
    const response = await fetch('/api/chat', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ messages: conversation })
    });

    if (response.status === 503) {
      setStatus('Service disabled', true);
      addMessage('assistant', 'Chat is temporarily disabled.');
      sendBtn.disabled = false;
      return;
    }

    if (response.status === 429) {
      setStatus('Usage cap reached', true);
      addMessage('assistant', 'Usage limits reached. Please try again later.');
      sendBtn.disabled = false;
      return;
    }

    if (!response.ok) {
      throw new Error(`Request failed with status ${response.status}`);
    }

    const payload = await response.json();
    const reply = payload.reply || 'No response received.';
    conversation.push({ role: 'assistant', content: reply });
    addMessage('assistant', reply);
    setStatus('Secure session');
  } catch (err) {
    console.error(err);
    setStatus('Error contacting server', true);
    addMessage('assistant', 'Could not reach chat service.');
  } finally {
    sendBtn.disabled = false;
    messageInput.focus();
  }
});

messageInput.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && !e.shiftKey) {
    e.preventDefault();
    form.requestSubmit();
  }
});

addMessage('assistant', 'Welcome to MyMI Chat. Start by typing your question.');
