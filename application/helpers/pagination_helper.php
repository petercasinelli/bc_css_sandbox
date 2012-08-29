<?php
class PaginationSettings {
		public static function set($total_rows, $url_segments){
			$config["total_rows"] = $total_rows;
			$config["base_url"] = base_url() . $url_segments;
			return $config;
		}
		
		public static function per_page(){
			$CI = &get_instance();
			$CI->load->library('pagination');
			return PAGINATION_PER_PAGE;
		}
	}

/*End of path_helper located in application/pagination*/	