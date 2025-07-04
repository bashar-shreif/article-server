<?php
require("../connection/connection.php");
require("../models/Category.php");
Category::setMysqli($mysqli);
Category::create(["category" => "Technology", "description" => "Covers all things tech — from gadgets, software, AI, and cybersecurity to how the latest innovations are changing our world. Think smartphones, coding trends, and 
future robots."]);

Category::create(["category" => "Health", "description" => "Focuses on mental health, fitness, nutrition, and overall well-being. Whether you\'re trying to heal your sleep schedule or understand anxiety, this category has your back."]);

Category::create(["category" => "Entertainment", "description" => "From anime and movies to music and gaming — this ones all about fun. Reviews, news, fan theories, and behind-the-scenes deep dives live here."]);

Category::create(["category" => "Science", "description" => "Breaks down complex science in simple terms and keeps you updated on climate change, sustainability, and cool discoveries like black holes or quantum physics."]);

Category::create(["category" => "Education", "description" => "For students, hustlers, and dreamers — think study tips, career paths, job market updates, how-tos on resumes, interviews, and all that growth-oriented grind."]);