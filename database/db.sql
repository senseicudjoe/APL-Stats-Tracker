DROP DATABASE IF EXISTS football_management;
CREATE DATABASE football_management;
USE football_management;



CREATE TABLE teams (
    team_id SERIAL PRIMARY KEY,
    team_name VARCHAR(100) NOT NULL UNIQUE,
    founded_year INTEGER,
    total_matches INTEGER DEFAULT 0,
    total_wins INTEGER DEFAULT 0,
    total_losses INTEGER DEFAULT 0
);

CREATE TABLE apl_users (
    user_id SERIAL PRIMARY KEY,
    first_name VARCHAR(100) UNIQUE NOT NULL,
    last_name VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

-- Players Table
CREATE TABLE players (
    player_id SERIAL PRIMARY KEY,
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
    stat_id SERIAL PRIMARY KEY,
    player_id INTEGER REFERENCES players(player_id),
    season_year INTEGER,
    games_played INTEGER DEFAULT 0,
    goals INTEGER DEFAULT 0,
    assists INTEGER DEFAULT 0
);

-- Matches Table
CREATE TABLE matches (
    match_id SERIAL PRIMARY KEY,
    season_year INTEGER,
    home_team_id INTEGER REFERENCES teams(team_id),
    away_team_id INTEGER REFERENCES teams(team_id),
    home_team_score INTEGER,
    away_team_score INTEGER
);

-- I may not do these parts depending on how much time I have 






-- Match Player Performance Table
CREATE TABLE match_player_performance (
    performance_id SERIAL PRIMARY KEY,
    match_id INTEGER REFERENCES matches(match_id),
    player_id INTEGER REFERENCES players(player_id),
    goals_scored INTEGER DEFAULT 0,
    assists_made INTEGER DEFAULT 0,
    minutes_played INTEGER,
    yellow_cards INTEGER DEFAULT 0,
    red_cards INTEGER DEFAULT 0
);

CREATE TABLE season_stats (
    season_id SERIAL PRIMARY KEY,
    year INTEGER NOT NULL,
    start_date DATE,
    end_date DATE,
    total_matches INTEGER DEFAULT 0,
    total_goals INTEGER DEFAULT 0
);