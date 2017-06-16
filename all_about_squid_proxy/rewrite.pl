#!/usr/bin/perl

$|=1;
while (<>) {
@X = split;
if ($X[0] =~ m/^http.*/) {
	$url		= $X[0];
	$referer	= $X[1];
	$urlreferer	= $X[0] ." ". $X[1];	
} else { 
	$chanel		= $X[0];
	$url		= $X[1];
	$referer	= $X[2];
	$urlreferer	= $X[1] ." ". $X[2];
}


#watch rewrite
if ($url=~ m/(^https?\:\/\/(www|gaming)\.youtube\.com\/(watch\?v|embed|v)[\=\%\&\?\/].*[\=\%\&\?\/])(nohtml5\=1|html5\=1)(.*)/) {
    $out="OK rewrite-url=$1" . "nohtml5=1" . $5;

} elsif ($url=~ m/(^https?\:\/\/(www|gaming)\.youtube\.com\/(watch\?v|embed|v)[\=\%\&\?\/].*[\=\%\&\?\/].*)/) {
    $out="OK rewrite-url=$1" . "&nohtml5=1";

} elsif ($url=~ m/(^https?\:\/\/(www|gaming)\.youtube\.com\/(watch\?v)[\=\%\&\?\/][^\?^\&]*$)/) {
    $out="OK rewrite-url=$1" ."&nohtml5=1";

} elsif ($url=~ m/(^https?\:\/\/(www|gaming)\.youtube\.com\/(embed|v)[\=\%\&\?\/][^\?^\&]*$)/) {
    $out="OK rewrite-url=$1" ."?nohtml5=1";

} else {
$out="ERR";
}

if ($X[0] =~ m/^http.*/) {
	print "$out\n";
} else {
	print "$chanel $out\n";
}
} 