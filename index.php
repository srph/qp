<?php
require 'Qp/Qp.php';
require 'Qp/Stringifier.php';
require 'Qp/Parser.php';
use Qp\Qp;

print_r(Qp::parse('user[name]=kier'));
print_r(Qp::parse('users[]=kier'));
print_r(Qp::stringify(['yolo' => 'swag', 'swag' => 'yolo']));