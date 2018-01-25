<?php
	namespace core;

	/**
	 * Classe gérant la vue
	 */
	class View {

		private $_file;
		private $_nav;
		private $_title;
		private $_datas;
		private $_user;

		public function getFile() { return $this->_file; }
		public function getNavState() { return $this->_nav; }
		public function getTitle() { return $this->_title; }
		public function getDatas() { return $this->_datas; }
		public function getUser() {return $this->_user; }

		public function setFile(string $file)
		{
			$this->_file = $file;
		}
		public function enableNav()
		{
			$this->_nav = true;
		}
		public function disableNav()
		{
			$this->_nav = false;
		}
		public function setTitle(string $title)
		{
			$this->_title = $title;
		}
		public function setDatas(array $datas)
		{
			$this->_datas = $datas;
		}
		public function setUser($user)
		{
			$this->_user = $user;
		}

		public function output()
		{
			$datas = $this->getDatas();
			$menu = $this->getNavState();
			$user = $this->getUser();

			ob_start();

			$content = \core\FileManager::getViewPath($this->_file);

			require_once \core\FileManager::getViewPath('main');

			$output = ob_get_contents();

			ob_end_clean();

			return $output;
		}
	};
