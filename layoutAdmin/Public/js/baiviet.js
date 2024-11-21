document.addEventListener('DOMContentLoaded', () => {
    const postForm = document.getElementById('postForm');
    const postsContainer = document.getElementById('posts');

    postForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const title = document.getElementById('title').value;
        const content = document.getElementById('content').value;

        addPost(title, content);

        postForm.reset();
    });

    function addPost(title, content) {
        const post = document.createElement('div');
        post.className = 'post';

        const postTitle = document.createElement('h3');
        postTitle.textContent = title;
        post.appendChild(postTitle);

        const postContent = document.createElement('p');
        postContent.textContent = content;
        post.appendChild(postContent);

        const editButton = document.createElement('button');
        editButton.textContent = 'Edit';
        editButton.addEventListener('click', () => editPost(post, postTitle, postContent));
        post.appendChild(editButton);

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.addEventListener('click', () => deletePost(post));
        post.appendChild(deleteButton);

        postsContainer.appendChild(post);
    }

    function editPost(post, postTitle, postContent) {
        const newTitle = prompt('Enter new title:', postTitle.textContent);
        const newContent = prompt('Enter new content:', postContent.textContent);

        if (newTitle !== null && newContent !== null) {
            postTitle.textContent = newTitle;
            postContent.textContent = newContent;
        }
    }

    function deletePost(post) {
        if (confirm('Are you sure you want to delete this post?')) {
            postsContainer.removeChild(post);
        }
    }
});