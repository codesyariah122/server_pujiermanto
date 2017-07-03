#!/usr/bin/perl
use IO::File;
$|=1;
STDOUT->autoflush(1);
$debug=1;           ## recommended:0
$bypassallrules=0;      ## recommended:0
$sucks="";          ## unused
$sucks="sucks" if ($debug>=1);
$timenow="";
$printtimenow=1;        ## print timenow: 0|1
my $logfile = '/var/log/squid/storeid.log';
 
open my $logfh, '>>', $logfile
    or die "Couldn't open $logfile for appending: $!\n" if $debug;
$logfh->autoflush(1) if $debug;
while (<>) {
$timenow=time()." " if ($printtimenow);
print $logfh "$timenow"."in : input=$_" if ($debug>=1);
@X = split;
if ($X[0] =~ m/^http.*/) {
    $url        = $X[0];
    $referer    = $X[1];
    $urlreferer = $X[0] ." ". $X[1];   
} else {
    $chanel     = $X[0];
    $url        = $X[1];
    $referer    = $X[2];
    $urlreferer = $X[1] ." ". $X[2];
}
 
if ($bypassallrules){
 $out="$url"; ## map 1:1
 
#youtube googlevideo
} elsif ($url =~ m/^https?\:\/\/.*google.*video(playback|goodput).*/){
    @cpn    = m/[=%&?\/]cpn[=%&?\/]([^\&\s]*)/;
    @id = m/[=%&?\/]id[=%&?\/]([^\&\s]*)/;
    @itag   = m/[=%&?\/]itag[=%&?\/]([\d]*)/;
    @range  = m/[=%&?\/]range[=%&?\/]([\d]*-[\d]*)/;
    @mime   = m/[=%&?\/]mime[=%&?\/]([^\&\s]*)/;
    if ($referer =~ m/^https?\:\/\/(www|gaming)\.youtube.*\.com\/(watch\?v|embed|v)[=%&?\/]([^\&\s\?]*)/){
        @id = $3;
    } else {
        if (defined(@cpn[0])){
            if (-e "/var/log/squid/@cpn"){
                open FILE, "/var/log/squid/@cpn";
                @id = <FILE>;
                close FILE;
            }
        }
    }
    $out="OK store-id=http://squid/google/video/id=@id/itag=@itag/mime=@mime/range=@range";
 
#youtube parameter
} elsif (
    ($url =~ m/^https?\:\/\/.*youtube.*(stream_204|watchtime|qoe|atr|csi_204|playback).*[=%&?\/]docid[=%&?\/]([^\&\s]*)/) ||
    ($url =~ m/^https?\:\/\/.*youtube.*(ptracking|set_awesome).*[=%&?\/]video_id[=%&?\/]([^\&\s]*)/) ||
    ($url =~ m/^https?\:\/\/.*youtube.*(player_204).*[=%&?\/]v[=%&?\/]([^\&\s]*)/)
    ){
    @id = $2;
    @cpn    = m/[=%&?\/]cpn[=%&?\/]([^\&\s]*)/;
    if ($referer !~ m/^https?\:\/\/(www|gaming)\.youtube.*\.com\/(watch\?v|embed|v)[=%&?\/]([^\&\s\?]*)/){
        unless (-e "/var/log/squid/@cpn"){
            open FILE, ">/var/log/squid/@cpn";
            print FILE @id;
            close FILE;
        }
    }
    $out = "ERR";

#utmgif
} elsif ($url =~ m/^https?\:\/\/www\.google-analytics\.com\/__utm\.gif\?.*/) {
	$out="OK store-id=http://squid/google-analytics/__utm.gif";

#fbcdn.net or akamaihd.net video range
} elsif ($url =~ m/^https?\:\/\/.*(fbcdn\.net|akamaihd\.net).*\/([\w-]+\.[\w]{2,4}).*(bytestart[=%&?\/][\d]+[&\/]byteend[=%&?\/][\d]+)/) {
	$out="OK store-id=http://squid/$1/$2/$3";

#fbcdn.net or akamaihd.net with size
} elsif ($url =~ m/^https?\:\/\/.*(fbcdn\.net|akamaihd\.net).*\/([a-zA-Z][\d]+[x][\d]+\/[\w-]+\.[\w]{2,4})($|\?)/) {
	$out="OK store-id=http://squid/$1/$2";

#fbcdn.net or akamaihd.net safe_image.php
} elsif ($url =~ m/^https?\:\/\/.*(fbcdn\.net|akamaihd\.net).*\/safe_image\.php\?(.*)/) {
	$out="OK store-id=http://squid/$1/$2";

#reverbnation
} elsif ($url =~ m/^https?\:\/\/c2lo\.reverbnation\.com\/audio_player\/ec_stream_song\/(.*)\?.*/) {
	$out="OK store-id=http://squid/reverbnation/$1";
 
#playstore
} elsif ($url =~ m/^https?\:\/\/.*\.c\.android\.clients\.google\.com\/market\/GetBinary\/GetBinary\/(.*\/.*)\?.*/) {
	$out="OK store-id=http://squid/android/market/$1";


#filehost
} elsif ($url =~ m/^https?\:\/\/.*datafilehost.*\/get\.php.*file\=(.*)/) {
	$out="OK store-id=http://squid/datafilehost/$1";


#speedtest
#} elsif ($url =~ m/^https?\:\/\/.*([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}|speedtest|espeed|api\.ookla).*\/(speedtest\.swf|speedtest-long\.swf|latency\.txt|upload\.php|speedtest-config\.php|ipaddress\.php|random.*\.jpg)/) {
} elsif ($url =~ m/^https?\:\/\/.*([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}|speedtest|espeed|api\.ookla).*\/(speedtest\.swf|speedtest-long\.swf)/) {
	$out="OK store-id=http://squid/speedtest/$2";


#filehippo
} elsif ($url =~ m/^https?\:\/\/.*\.filehippo\.com\/.*\/([\w-]+\.[\w]{2,4})\?.*/) {
	$out="OK store-id=http://squid/filehippo/$1";


#4shared preview.mp3
} elsif ($url =~ m/^https?\:\/\/.*\.4shared\.com\/.*\/(.*\/.*)\/dlink.*preview.mp3/) {
	$out="OK store-id=http://squid/4shared/preview/$1";

#4shared
} elsif ($url =~ m/^https?\:\/\/.*\.4shared\.com\/download\/(.*\/.*)\?tsid.*/) {
	$out="OK store-id=http://squid/4shared/download/$1";

#savefile-animeindo.tv
} elsif ($url =~ m/^https?:\/\/www\.savefile\.co\:[0-9]{2,5}\/.*\/(.*\.(mp4|flv|3gp)).*/) {
	$out="OK store-id=http://squid/savefile:182/$1";

#imdb
} elsif ($url =~ m/^https?\:\/\/video\-http\.media\-imdb\.com\/(.*\.mp4)\?.*/) {
	$out="OK store-id=http://squid/imdb/$1";

#sourceforge
} elsif ($url =~ m/^https?\:\/\/.*\.dl\.sourceforge\.net\/([\w-]+\.[\w]{2,3})/) {
	$out="OK store-id=http://squid/sourceforge/$1";

#steampowered dota 2
} elsif ($url =~ m/^https?\:\/\/.*steam(powered|content).*\/((client|depot)\/.*\/(chunk|manifest)\/.*)\?.*/) {
	$out="OK store-id=http://squid/steam/$2";

#patch gemscool lsaga
} elsif ($url =~ m/^https?\:\/\/(patch\.gemscool\.com\/lsaga.*\.iop.*)\?.*/) {
	$out="OK store-id=http://squid/$1";

#youtubeinmp3
} elsif ($url =~ m/^https?:\/\/.*\youtubeinmp3\.com\/download\/get\/.*/) {
	@id	= m/[=%&?\/]id[=%&?\/]([^\&\s]*)/;
	@t	= m/[=%&?\/]t[=%&?\/]([^\&\s]*)/;
	$out="OK store-id=http://squid/youtubeinmp3/id=@id/t=@t";

#googleusercontent
} elsif ($url =~ m/^https?\:\/.*\.(googleusercontent\.com\/.*\/[^\?\&\%\=\/\s]*)/) {
	$out="OK store-id=http://squid/$1";

#mp4upload
} elsif ($url =~ m/^https?\:\/\/.*mp4upload\.com\:[0-9]{2,5}\/(.*\.[\w]{2,5})/) {
	@id = $1;
	if (
	    ($referer =~ m/^https?\:\/\/.*mp4upload\.com\/embed-(.*)\.[\w]{2,4}/) ||
	    ($referer =~ m/^https?\:\/\/.*mp4upload\.com\/(.*)/)
	   )
	{@id = $1;}
	$out="OK store-id=http://squid/mp4upload/@id";

} else {
	$out="ERR";
}

if ($X[0] =~ m/^http.*/) {
    print $logfh "$timenow"."in : chanel=$chanel referer=$referer\n" if ($debug>=1);
    print $logfh "$timenow"."in : url=$url\n" if ($debug>=1);
    print $logfh "$timenow"."out: $out\n" if ($debug>=1);
    print $logfh "\n" if ($debug>=1);
    print "$out\n";
} else {
    print $logfh "$timenow"."in : chanel=$chanel referer=$referer\n" if ($debug>=1);
    print $logfh "$timenow"."in : url=$url\n" if ($debug>=1);
    print $logfh "$timenow"."out: $chanel $out\n" if ($debug>=1);
    print $logfh "\n" if ($debug>=1);
    print "$chanel $out\n";
}
}
close $logfh if ($debug);