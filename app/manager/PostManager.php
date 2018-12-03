<?php

namespace App\app\manager;


/** Manage the posts
 * Class PostManager
 * @package App\app\model
 */
class PostManager extends DatabaseManager
{
	/** Get all posts
	 * @return array
	 */
	public function getAllPosts() {
		$statement = 'SELECT * FROM posts ORDER BY creation_date';
		$request = $this->getSql($statement, 'App\app\model\Post');
		$requestGet = $request->fetchAll();
		return $requestGet;
	}

	/** Get one post
	 * @param $idPost
	 * @return bool|false|\PDOStatement
	 */
	public function getPost($idPost) {
		$statement = 'SELECT * FROM posts WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Post', [$idPost]);
		$requestGet = $request->fetch();

		return $requestGet;
	}

	/** Add a post
	 * @param $data
	 * @return mixed
	 */
	public function addPost($data) {
		extract($data);
		/** @var string $title */
		/** @var string $content */
		$statement = 'SELECT * FROM posts WHERE title = ?';
		$request = $this->getSql($statement, 'App\app\model\Post', [$title]);
		$countGet = $request->rowCount();
		$requestGet = false;

		if ($countGet === 0) {
			$statement = 'INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())';
			$requestGet = $this->getSql($statement, 'App\app\model\Post', [$title, $content]);
		}

		return $requestGet;
	}

	/** Edit a post
	 * @param $data
	 * @return mixed
	 */
	public function editPost($data) {
		extract($data);
		/** @var string $id */
		$statement = 'SELECT * FROM posts WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Post', [$id]);
		$countGet = $request->rowCount();
		$requestGet = false;

		if ($countGet === 1) {
			/** @var string $title */
			/** @var string $content */
			$statement = 'UPDATE posts SET title = ?, content = ? WHERE id = ?';
			$requestGet = $this->getSql($statement, 'App\app\model\Post', [$title, $content, $id]);
		}

		return $requestGet;
	}

	/** Delete a post
	 * @param $data
	 * @return mixed
	 */
	public function deletePost($data) {
		extract($data);
		/** @var string $id */
		$statement = 'SELECT * FROM posts WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Post', [$id]);
		$countGet = $request->rowCount();
		$requestGet = false;

		if ($countGet === 1) {
			$statement = 'DELETE FROM posts WHERE id = ?';
			$requestGet = $this->getSql($statement, 'App\app\model\Post', [$id]);
		}

		return $requestGet;
	}
}