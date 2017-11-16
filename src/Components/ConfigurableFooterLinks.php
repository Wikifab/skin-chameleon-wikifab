<?php
/**
 * File containing the Wikifab Footer class
 *
 *
 * @file
 * @ingroup   Skins
 */

namespace Skins\Chameleon\Components;

use Linker;

/**
 * ToolbarHorizontal class
 *
 * A horizontal toolbar containing standard sidebar items (toolbox, language links).
 *
 * The toolbar is an unordered list in a nav element: <nav role="navigation" id="p-tb" >
 *
 * @author Stephan Gambke
 * @since 1.0
 * @ingroup Skins
 */
class ConfigurableFooterLinks extends Component {


	private function getLiLinkEntry($link) {

		// retreive url :
		if (is_array($link['url'])) {
			$key = $link['url']['page'];
			if (isset($link['url']['namespace'])) {
				$key = $link['url']['namespace'] . ':' . $key;
			}
			if (isset($link['url']['query'])) {
				$query = $link['url']['query'];
			} else {
				$query = '';
			}
			$title = \Title::newFromDBkey($key);
			if($title) {
				$url = \Title::newFromDBkey($key)->getFullURL($query);
			} else {
				$url = "ERR " . $key;
			}

		} else {
			$url = $link['url'];
		}
		// get the label :
		if (isset($link['name'])) {
			$label = wfMessage($link['name']);
		} else if (isset($link['name-text'])) {
			$label = $link['name-text'];
		} else {
			$label = $url;
		}
		$target ='';
		if (isset($link['target'])) {
			$target = " target='$target'";
		}

		$html = "<li><a href=\"$url\" $target >$label</a></li>";
		return $html;
	}

	private function getColDivForLinks($colTitle, $links, $bootstrapSize = 3) {
		$html = '';
		$html .= $this->indent() .'<div class="col-md-'.$bootstrapSize.' col-sm-'.$bootstrapSize.' col-xs-6">';
		$this->indent(1) ;
		if ($colTitle) {
			$html .= $this->indent() .'<h4>'. wfMessage( $colTitle )->text() .'</h4>';
		} else {
			$html .= $this->indent() .'<h4>&nbsp;</h4>';
		}
		$html .= $this->indent() .'<ul class="list-unstyled">';
		$this->indent(1) ;

		foreach ($links as $link) {
			$html .= $this->indent() . $this->getLiLinkEntry($link);
		}
		$this->indent(-1) ;
		$html .= $this->indent() .'</ul>';
		$this->indent(-1) ;
		$html .= $this->indent() .'</div>';

		return $html;
	}

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {

		global $wgFooterLinks;


		$html = $this->indent() .'<div class="row footer-links configurable-footer">';
		$this->indent(1) ;


		$footerAboutText = wfMessage('Footer-about');
		if ($footerAboutText->exists()) {
			$remainingSize = 8;
			$html .= $this->indent() .'<div class="col-md-4 col-sm-4 col-xs-6">';
			$html .= $this->indent() . $footerAboutText->parse();
			$html .= $this->indent() .'</div >';
		} else {
			$remainingSize = 12;
		}

		$remainingColNb = count($wgFooterLinks);

		foreach ($wgFooterLinks as $colTitle => $links) {
			if(is_int($colTitle)) {
				$colTitle = null;
			}
			// the boostrap size is calculated each time according to remaining space and nb col to print
			$bootstrapSize = ceil($remainingSize / (1.0 * $remainingColNb ));
			$html .= $this->getColDivForLinks($colTitle, $links, $bootstrapSize);
			$remainingColNb --;
			$remainingSize = $remainingSize - $bootstrapSize;
		}

		$this->indent(-1) ;
		$html .= $this->indent() .'</div>';

		return $html;
	}
}
