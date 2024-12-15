DROP DATABASE IF EXISTS football_management;
CREATE DATABASE football_management;
USE football_management;



CREATE TABLE teams (
    team_id INT AUTO_INCREMENT PRIMARY KEY,
    team_name VARCHAR(100) NOT NULL UNIQUE,
    founded_year INTEGER,
    total_matches INTEGER DEFAULT 0,
    total_wins INTEGER DEFAULT 0,
    total_losses INTEGER DEFAULT 0
);

CREATE TABLE apl_users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) UNIQUE NOT NULL,
    last_name VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

-- Players Table
CREATE TABLE players (
    player_id INT AUTO_INCREMENT PRIMARY KEY,
    team_id INTEGER REFERENCES teams(team_id),
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    position VARCHAR(50),
    jersey_number INTEGER,
    date_of_birth DATE,
    nationality VARCHAR(100)
);

-- Player Statistics Table
CREATE TABLE player_stats (
    stat_id INT AUTO_INCREMENT PRIMARY KEY,
    player_id INTEGER REFERENCES players(player_id),
    season_year INTEGER,
    games_played INTEGER DEFAULT 0,
    goals INTEGER DEFAULT 0,
    assists INTEGER DEFAULT 0
);

-- Matches Table
CREATE TABLE matches (
    match_id INT AUTO_INCREMENT PRIMARY KEY,
    season_year INTEGER,
    home_team_id INTEGER REFERENCES teams(team_id),
    away_team_id INTEGER REFERENCES teams(team_id),
    home_team_score INTEGER,
    away_team_score INTEGER
);

ALTER TABLE teams
ADD COLUMN total_draws INT DEFAULT 0;



