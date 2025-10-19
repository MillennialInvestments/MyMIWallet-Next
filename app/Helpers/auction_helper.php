<?php
if (!function_exists('solveGrowthR')) {
    function solveGrowthR(float $targetUSD, int $bucketSize, float $p0, int $N, float $tol=1e-2): float {
        $lo=0.0; $hi=0.10;
        for ($i=0;$i<60;$i++){
            $mid=($lo+$hi)/2.0;
            $raised = $mid<=0.0 ? $bucketSize*$p0*$N : $bucketSize*$p0*(pow(1+$mid,$N)-1)/$mid;
            if (abs($raised-$targetUSD)<=$tol) return $mid;
            if ($raised<$targetUSD) $lo=$mid; else $hi=$mid;
        }
        return ($lo+$hi)/2.0;
    }
}
?>