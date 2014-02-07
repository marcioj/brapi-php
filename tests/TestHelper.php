<?php
$Env = new josegonzalez\Dotenv\Loader('.env');
$Env->parse();
$Env->toEnv(true);
