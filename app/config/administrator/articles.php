<?php

  return array(

      'title' => 'Articles',
      'single' => 'article',
      'model' => 'Article',

      'columns' => array(
          'title' => array(
              'title' => 'Title',
          ),
          'body' => array(
              'title' => 'Content',
          ),
      ),

      'edit_fields' => array(
          'title' => array(
              'title' => 'Title',
          ),
          'body' => array(
              'title' => 'Content',
              'type' => 'wysiwyg',
          ),

      ),
  );
