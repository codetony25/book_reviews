<?php

$config = array(
    'register' => array(
                    array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'alias',
                        'label' => 'Alias',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'email',
                        'label' => 'E-mail',
                        'rules' => 'trim|required|valid_email|is_unique[users.email]'
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[8]|matches[passconf]'
                    ),
                    array(
                        'field' => 'passconf',
                        'label' => 'Password Confirmation',
                        'rules' => 'trim|required|min_length[8]'
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[8]|matches[passconf]'
                    )
            ),
    'login' => array(
                array(
                        'field' => 'email',
                        'label' => 'E-mail',
                        'rules' => 'trim|required|valid_email'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[8]'
                )
            ),
    'books' => array(
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'author_name',
                        'label' => 'Author Name',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'review',
                        'label' => 'Review',
                        'rules' => 'trim|required|min_length[8]'
                ),
                array(
                        'field' => 'rating',
                        'label' => 'Rating',
                        'rules' => 'trim|required'
                )
            ),
    'reviews' => array(
                  array(
                    'field' => 'review',
                    'label' => 'Review',
                    'rules' => 'trim|required|min_length[8]'
                ),
                  array(
                    'field' => 'rating',
                    'label' => 'Rating',
                    'rules' => 'trim|required'
                )
            )
    
);


?>