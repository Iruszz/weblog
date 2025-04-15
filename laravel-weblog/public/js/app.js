

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.category-checkbox').forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        const selected = Array.from(document.querySelectorAll('.category-checkbox:checked')).map(cb => cb.value);
        
        console.log("Selected categories:", selected);

        if (checkbox.checked) {
          } else {
          }

        document.querySelectorAll('.article-card').forEach(article => {
          const categoryId = article.getAttribute('data-category-id');

          if (selected.length === 0 || selected.includes(categoryId)) {
            article.style.display = '';
          } else {
            article.style.display = 'none';
          }
        });
      });
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    const createCategoryButton = document.querySelector('.create-category-button');
    const createCategoryInputWrapper = document.querySelector('.create-category-input');
    const dropdown = document.getElementById('dropdown');
  
    createCategoryButton.addEventListener('click', (e) => {
      e.stopPropagation();
      createCategoryButton.style.display = 'none';
      createCategoryInputWrapper.style.display = 'flex';
    });
  
    document.addEventListener('click', function (event) {
      const isClickInsideDropdown = dropdown.contains(event.target);
  
      if (!isClickInsideDropdown) {
        createCategoryInputWrapper.style.display = 'none';
        createCategoryButton.style.display = 'flex';
      }
    });
  });