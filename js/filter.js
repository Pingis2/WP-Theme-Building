document.addEventListener("DOMContentLoaded", function () {
    const filterContainer = document.getElementById("language-filter-buttons");
    const postContainer = document.getElementById("filtered-posts");

    // Fetch languages (taxonomy terms)
    fetch(`${wpApiSettings.root}wp/v2/language`)
        .then((response) => response.json())
        .then((languages) => {
            languages.forEach((lang) => {
                const button = document.createElement("button");
                button.innerText = lang.name;
                button.dataset.slug = lang.id;
                button.addEventListener("click", () => fetchPostsByLanguage(lang.id));
                filterContainer.appendChild(button);
            });
        });

    // Fetch posts by language
    function fetchPostsByLanguage(language) {
        fetch(`${wpApiSettings.root}wp/v2/projects?language=${language}`)
            .then((response) => response.json())
            .then((posts) => {
                postContainer.innerHTML = "";
                posts.forEach((post) => {
                    const postElement = document.createElement("div");
                    postElement.innerHTML = `<h2>${post.title.rendered}</h2><p>${post.excerpt.rendered}</p>`;
                    postContainer.appendChild(postElement);
                });
            });
    }
});