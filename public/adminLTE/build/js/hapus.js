document.addEventListener('click', function (e) {
  if (e.target && e.target.classList.contains('delete-button')) {
      if (confirm()) {
          var id = e.target.getAttribute('data-id');
          var url = '/dashboard/' + id;
          axios.delete(url)
              .then(function (response) {
                  console.log(response.data);
              })
              .catch(function (error) {
                  console.error(error);
              });
      }
  }
});
