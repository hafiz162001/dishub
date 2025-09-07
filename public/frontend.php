<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Posts - Laravel API</title>
</head>
<body>
    <h1>Daftar Post</h1>
    <ul id="postList"></ul>

    <h2>Tambah Post Baru</h2>
    <form id="postForm">
        <input type="text" id="title" placeholder="Judul" required>
        <input type="text" id="content" placeholder="Konten" required>
        <button type="submit">Tambah</button>
    </form>

    <script>
        const API_URL = "http://127.0.0.1:8000/api/posts";

        // GET semua post
        async function getPosts() {
            const res = await fetch(API_URL);
            const posts = await res.json();

            const list = document.getElementById("postList");
            list.innerHTML = "";

            posts.forEach(post => {
                const li = document.createElement("li");
                li.innerHTML = `
                    <b>${post.title}</b> - ${post.content}
                    <button onclick="deletePost(${post.id})">Hapus</button>
                `;
                list.appendChild(li);
            });
        }

        // POST tambah post
        document.getElementById("postForm").addEventListener("submit", async (e) => {
            e.preventDefault();
            const title = document.getElementById("title").value;
            const content = document.getElementById("content").value;

            await fetch(API_URL, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ title, content })
            });

            getPosts(); // Refresh data
            e.target.reset();
        });

        // DELETE post
        async function deletePost(id) {
            await fetch(`${API_URL}/${id}`, { method: "DELETE" });
            getPosts();
        }

        // Jalankan saat pertama kali dibuka
        getPosts();
    </script>
</body>
</html>
