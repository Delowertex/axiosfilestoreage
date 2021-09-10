
function getTodos(){
    axios
    .post('https://jsonplaceholder.typicode.com/todos?_limit=5', {
      title: 'New list',
      completed: true
    })
    .then(res => showOutput(res))
    .catch(err => console.error(err));
}

function showOutput(res) {
    document.getElementById('res').innerHTML = `
    <div class="card card-body mb-4">
      <h5>Status: ${res.status}</h5>
    </div>
  
    <div class="card mt-3">
      <div class="card-header">
        Data
      </div>
      <div class="card-body">
        <pre>${JSON.stringify(res.data, null, 2)}</pre>
      </div>
    </div>
    `;
}

document.getElementById('get').addEventListener('click', getTodos);