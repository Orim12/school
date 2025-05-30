CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    comment TEXT NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
);
