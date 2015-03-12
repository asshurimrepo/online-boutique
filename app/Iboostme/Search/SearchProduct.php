<?php
	namespace Iboostme\Search;

	use Product;

	class SearchProduct {

		/**
		 * @var array
		 */
		protected $inputs = [ ];

		public function __construct()
		{
			$this->model  = new Product;
			$this->inputs = \Input::all();
			$this->beginSearch();
		}

		/**
		 * @return \Illuminate\Database\Eloquent\Collection|static[]
		 */
		public function get()
		{
			return $this->model->get();
		}

		/**
		 *
		 */
		private function beginSearch()
		{
			foreach ( $this->inputs as $method => $value )
			{
				if ( method_exists( $this, $method ) )
				{
					$this->model = $this->$method( $value );
				}
			}
		}

		/**
		 * @param $value
		 *
		 * @return $this
		 */
		private function keywords( $value )
		{
			return $this->model->where( 'title', 'like', "%{$value}%" );
		}

		/**
		 * @param $value
		 *
		 * @return $this
		 */
		private function breast( $value )
		{
			return $this->model->whereBetween( 'vs_breast', [ $value - 1, $value + 1 ] );
		}

		/**
		 * @param $value
		 *
		 * @return $this
		 */
		private function shoulder( $value )
		{
			return $this->model->whereBetween( 'vs_shoulder', [ $value - 1, $value + 1 ] );
		}

		/**
		 * @param $value
		 *
		 * @return $this
		 */
		private function waist( $value )
		{
			return $this->model->whereBetween( 'vs_waist', [ $value - 1, $value + 1 ] );
		}

		/**
		 * @param $value
		 *
		 * @return $this
		 */
		private function hips( $value )
		{
			return $this->model->whereBetween( 'vs_hips', [ $value - 1, $value + 1 ] );
		}

	}