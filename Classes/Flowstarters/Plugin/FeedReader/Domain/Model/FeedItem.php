<?php
namespace Flowstarters\Plugin\FeedReader\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package                          *
 * "Flowstarters.Plugin.FeedReader".                                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * A feed item DTO to be used in templates.
 */
class FeedItem {

	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $author;

	/**
	 * @var string
	 */
	protected $link;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $content;

	/**
	 * @var string
	 */
	protected $publicationDate;

	/**
	 * @param string $author
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}

	/**
	 * @return string
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @param string $content
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param string $link
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * @return string
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param string $publicationDate
	 */
	public function setPublicationDate($publicationDate) {
		$this->publicationDate = $publicationDate;
	}

	/**
	 * @return \DateTime
	 */
	public function getPublicationDate() {
		return $this->publicationDate;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param \SimplePie_Item $feedItem
	 */
	public function populateFromSimplePieItem(\SimplePie_Item $feedItem) {
		$this->setLink($feedItem->get_link());
		$this->setTitle($feedItem->get_title());
		$this->setDescription($feedItem->get_description());
		$this->setContent($feedItem->get_content(TRUE));
		$this->setPublicationDate(new \DateTime($feedItem->get_date()));
		$this->setAuthor($feedItem->get_author());
	}
}

?>