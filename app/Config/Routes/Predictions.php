<?php

$routes->get('Predictions', 'PredictionsController::index', ['filter' => 'login']);
