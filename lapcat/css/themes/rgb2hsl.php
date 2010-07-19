<?
class hsl2rgb
{
    public function convert() {
        preg_match_all("/hsla?\(([^\)]+)\)/i",$this->css,$match,PREG_PATTERN_ORDER);
        foreach($match[1] as $k=>$v) {
            $hsl = self::hsl(self::fromString($v));
            $rgb = "rgb";
            if (isset($hsl[3])) {
                $alpha = ",".$hsl[3];
                $rgb = "rgba";
				$this->css = str_replace($match[0][$k], "$rgb(".$hsl[0].",".$hsl[1].",".$hsl[2].$alpha.")",$this->css);
            }else{
            	$this->css = str_replace($match[0][$k], "$rgb(".$hsl[0].",".$hsl[1].",".$hsl[2].")",$this->css);	
            }
            
        }
    }
    private function fromString($str) {
        $x = preg_split('/[, ]/', $str, -1, PREG_SPLIT_NO_EMPTY);
        $h = $x[0];
        $s = substr($x[1], -1) == '%' ? ((float) $x[1]) : (float) $x[1]*100;
        $l = substr($x[2], -1) == '%' ? ((float) $x[2]) : (float) $x[2]*100;
		if(isset($x[3])){	return array($h, $s, $l, $x[3]); }else{return array($h, $s, $l);} // fixed a bad code
        
    }
    private function hsl($hsl) { 
        $h = $hsl[0]/360;
        $s = $hsl[1]/100;
        $l = $hsl[2]/100;
        if ($s == 0.0) { $r = $g = $b = $l; }
        else {
            if ($l<=0.5) { $m2 = $l*($s+1); }
            else { $m2 = $l+$s-($l*$s); }
            $m1 = $l*2 - $m2;
            $r = self::hue($m1, $m2, ($h+1/3));
            $g = self::hue($m1, $m2, $h);
            $b = self::hue($m1, $m2, ($h-1/3));
        }
		if(isset($hsl[3])){	return array(round($r*255), round($g*255), round($b*255), $hsl[3]); }else{return array(round($r*255), round($g*255), round($b*255));} // fixed a bad code
        
    }
    private function hue($m1, $m2, $h) {
        if ($h<0) { $h = $h+1; }
        if ($h>1) { $h = $h-1; }
        if ($h*6<1) { return $m1+($m2-$m1)*$h*6; }
        if ($h*2<1) { return $m2; }
        if ($h*3<2) { return $m1+($m2-$m1)*(2/3-$h)*6; }
        return $m1;
    }
}
?>