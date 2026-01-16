// script.js

const movies = [
  "Inception",
  "Interstellar",
  "The Matrix",
  "Forrest Gump",
  "The Godfather",
  "The Dark Knight",
  "Pulp Fiction",
  "Titanic",
];

const genreMovies = {
  Comedy: ["Superbad", "The Hangover", "Step Brothers","Ted"],
  Romance:["Titanic","The Notebook","La La Land","My oxford year"],
  Thriller: ["Inception","Seven","Gone","Joker","The call","Train to busan"],
  Fantacy:["Harry potter","The Lord of the Rings","The Hobbit","Avatar"],
  Horror: ["Shutter","The Conjuring", "Get Out", "A Quiet Place"],
  action: ["Mad Max: Fury Road", "John Wick", "Gladiator"],
  drama: ["Shawshank Redemption", "The Pursuit of Happyness", "Whiplash"],
  "sci-fi": ["Interstellar","Blade Runner 2049", "Arrival", "Dune"],
};

function pickRandomMovie() {
  const result = document.getElementById("result");
  const movie = movies[Math.floor(Math.random() * movies.length)];
  result.textContent = `🎥 You should watch: ${movie}`;
}

function pickByGenre() {
  const genre = document.getElementById("genreSelect").value;
  const result = document.getElementById("genreResult");
  const options = genreMovies[genre];
  const movie = options[Math.floor(Math.random() * options.length)];
  result.textContent = `📽️ Try this ${genre} movie: ${movie}`;
}


// Custom list logic

let customList = [];
document.addEventListener("DOMContentLoaded", function () {
  const movieForm = document.getElementById("movieForm");
  const movieInput = document.getElementById("movieInput");
  const movieList = document.getElementById("movieList");

  if (movieForm) {
    movieForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const movie = movieInput.value.trim();
      if (movie !== " ") {
        customList.push(movie);
        const li = document.createElement("li");
        li.textContent = movie;
        movieList.appendChild(li);
        movieInput.value = " ";
      }
    });
  }
});

function pickFromCustomList() {
  const result = document.getElementById("customResult");
  if (customList.length === 0) {
    result.textContent = "❗ Your list is empty. Add some movies!";
  } else {
    const movie = customList[Math.floor(Math.random() * customList.length)];
    result.textContent = `🎬 Your custom pick: ${movie}`;
  }
}
