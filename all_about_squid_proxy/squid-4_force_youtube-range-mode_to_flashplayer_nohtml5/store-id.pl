############################################################ STOREID.PL ##################################################################
############################################ Menjelang Pilkada/pilgub/pilpres Hati-Hati ##################################################
########################################################## Jadi Alat Politik #############################################################
################################################# yang lain lari terkencing-kencing ######################################################
##################################################### mengkafirkan yang lainnya ##########################################################
#!/usr/bin/perl
use IO::File;
$|=1;
STDOUT->autoflush(1);
$debug=0;			## recommended:0
$bypassallrules=0;		## recommended:0
$sucks="";			## unused
$sucks="sucks" if ($debug>=1);
$timenow="";
$printtimenow=1;  		## print timenow: 0|1
my $logfile = '/tmp/storeid.log';

open my $logfh, '>>', $logfile
    or die "Couldn't open $logfile for appending: $!\n" if $debug;
$logfh->autoflush(1) if $debug;

while (<>) {
$timenow=time()." " if ($printtimenow);
print $logfh "$timenow"."in : $_" if ($debug>=1);
chop; 
my $myURL = $_;
@X = split(" ",$myURL);
$a = $X[0]; ## channel id
$b = $X[1]; ## url
$c = $X[2]; ## ip address
$u = $b; ## url

if ($X[0] =~ m/^http.*/) {
	$u	= $X[0];
	$rf	= $X[1];
	$urf	= $X[0] ." ". $X[1];	
} else { 
	$c	= $X[0];
	$u	= $X[1];
	$rf	= $X[2];
	$urf	= $X[1] ." ". $X[2];
}

#youtube googlevideo
if ($u =~ m/^https?\:\/\/.*google.*video(playback|goodput).*/){
	@cpn	= m/[=%&?\/]cpn[=%&?\/]([^\&\s]*)/;
	@id	= m/[=%&?\/]id[=%&?\/]([^\&\s]*)/;
	@itag	= m/[=%&?\/]itag[=%&?\/]([\d]*)/;
	@range	= m/[=%&?\/]range[=%&?\/]([\d]*-[\d]*)/;
	@mime	= m/[=%&?\/]mime[=%&?\/]([^\&\s]*)/;
	if ($rf =~ m/^https?\:\/\/www\.youtube\.com\/(watch\?v|embed|v)[=%&?\/]([^\&\s\?]*)/){
		@id	= $2;
	} else {
		if (defined(@cpn[0])){
			if (-e "/tmp/@cpn"){
				open FILE, "/tmp/@cpn";
				@id = <FILE>;
				close FILE;
			}
		}
	}
	$out="OK store-id=http://squid/google/video/id=@id/itag=@itag/mime=@mime/range=@range";


#youtube parameter
} elsif (
	($u =~ m/^https?\:\/\/.*youtube.*(stream_204|watchtime|qoe|atr|csi_204|playback).*[=%&?\/]docid[=%&?\/]([^\&\s]*)/) ||
	($u =~ m/^https?\:\/\/.*youtube.*(ptracking|set_awesome).*[=%&?\/]video_id[=%&?\/]([^\&\s]*)/) ||
	($u =~ m/^https?\:\/\/.*youtube.*(player_204).*[=%&?\/]v[=%&?\/]([^\&\s]*)/)
	){
	@id	= $2;
	@cpn    = m/[=%&?\/]cpn[=%&?\/]([^\&\s]*)/;
	if ($rf !~ m/^https?\:\/\/www\.youtube\.com\/(watch\?v|embed|v)[=%&?\/]([^\&\s\?]*)/){
		unless (-e "/tmp/@cpn"){
			open FILE, ">/tmp/@cpn";
			print FILE @id;
			close FILE;
		}
	}
	$out = "ERR";

if ($bypassallrules){
 $out="$u"; ## map 1:1

#fbcdn-akamaihd-mamamyuk

} elsif ($u =~ m/^http(.*)static(.*)(akamaihd|fbcdn).net\/rsrc.php\/(.*\/.*\/(.*).(js|css|png|gif))(\?(.*)|$)/) {
	$out="OK store-id=http://squid/fbcdn/akamaihd/$5/$6";

} elsif ($u =~ m/http.*\.(fbcdn|akamaihd)\.net\/h(profile|photos).*[\d\w].*\/([\w]\d+x\d+\/.*\.[\d\w]{3}).*/) {
	$out="OK store-id=http://squid/akamaih/profile/photos$1/$2/$3";

} elsif ($u =~ m/^http(.*)static(.*)(akamaihd|fbcdn).net\/rsrc.php\/(.*\/.*\/(.*).(js|css|png|gif))(\?(.*)|$)/) {
	$out="OK store-id=http://squid/rsrc/fbcdn/$5/$6";

} elsif ($u=~ m/^https?:\/\/[a-zA-Z0-9\-\_\.\%]*(fbcdn|akamaihd)[a-zA-Z0-9\-\_\.\%]*net\/rsrc\.php\/(.*)/) { 
	$out="OK store-id=http://squid/rsrc/akamaihd/fbcdn/$2";

} elsif ($u =~ m/^https?\:\/\/.*(profile|photo|creative).*\.ak\.fbcdn\.net\/((h|)(profile|photos)-ak-)(snc|ash|prn)[0-9]?(.*)/) {
	$out="OK store-id=http://squid/fbcdn/photo/$2/$6";

} elsif ($u =~ m/^https?:\/\/.*(profile|photo|creative)*.akamaihd\.net\/((h|)(profile|photos|ads)-ak-)(snc|ash|prn|frc[0-9])[0-9]?(.*)/) {
	$out="OK store-id=http://squid/akahamihd-photos/$2/$5/$6";

} elsif ($u =~ m/^https?\:\/\/.*(fbcdn\.net|akamaihd\.net).*\/([\w-]+\.[\w]{2,4}).*(bytestart[=%&?\/][\d]+[&\/]byteend[=%&?\/][\d]+)/) {
	$out="OK store-id=http://squid/akamaihd/$1/$2/$3";

} elsif ($u =~ m/^http:\/\/([a-z])[0-9]?(\.gstatic\.com.*|\.wikimapia\.org.*)/) {
	$out="OK store-id=http://squid/gstatic/$2";

} elsif ($u =~ m/^https?:\/\/.*(googleusercontent.com|blogspot.com)\/(.*)\/([a-z0-9]+)(-[a-z]-[a-z]-[a-z]+)?\/(.*\.(jpg|png))/){
	$out="OK store-id=http://squid/googleusercontent1/$5";

} elsif ($_ =~ m/^https?:\/\/([a-z0-9.]*)(\.doubleclick\.net|\.quantserve\.com|.exoclick\.com|interclick.\com|\.googlesyndication\.com|\.auditude\.com|.visiblemeasures\.com|yieldmanager|cpxinteractive)(.*)/){
	$out="OK store-id=http://squid/doubleclick/$3";

} elsif ($u =~ m/^http:\/\/(.*?)\.yimg\.com\/(.*?)\.yimg\.com\/(.*?)\?(.*)/) {
	$out="OK store-id=http://squid/yimg/$3";

#utmgif
} elsif ($u =~ m/^https?\:\/\/www\.google-analytics\.com\/__utm\.gif\?.*/) {
	$out="OK store-id=http://squid/google/analytics/__utm.gif";

#fbcdn.net or akamaihd.net with size
} elsif ($u =~ m/^https?\:\/\/.*(fbcdn\.net|akamaihd\.net).*\/([a-zA-Z][\d]+[x][\d]+\/[\w-]+\.[\w]{2,4})($|\?)/) {
	$out="OK store-id=http://squid/fbcdn/net/akamaihd/net/$1/$2";

#fbcdn.net or akamaihd.net safe_image.php
} elsif ($u =~ m/^https?\:\/\/.*(fbcdn\.net|akamaihd\.net).*\/safe_image\.php\?(.*)/) {
	$out="OK store-id=http://squid/fbcdn2/akamaihd2/$1/$2";

#reverbnation
} elsif ($u =~ m/^https?\:\/\/c2lo\.reverbnation\.com\/audio_player\/ec_stream_song\/(.*)\?.*/) {
	$out="OK store-id=http://squid/reverbnation/$1";
 
#playstore
} elsif ($u =~ m/^https?\:\/\/.*\.c\.android\.clients\.google\.com\/market\/GetBinary\/GetBinary\/(.*\/.*)\?.*/) {
	$out="OK store-id=http://squid/android/market/$1";

#filehost
} elsif ($u =~ m/^https?\:\/\/.*datafilehost.*\/get\.php.*file\=(.*)/) {
	$out="OK store-id=http://squid/datafilehost/$1";


#speedtest
} elsif ($u =~ m/^https?\:\/\/.*(speedtest|espeed).*\/(.*\.(txt|jpg)).*/) {
	$out="OK store-id=http://squid/speedtest/$2";


#filehippo
} elsif ($u =~ m/^https?\:\/\/.*\.filehippo\.com\/.*\/([\w-]+\.[\w]{2,4})\?.*/) {
	$out="OK store-id=http://squid/filehippo/$1";


#4shared preview.mp3
} elsif ($u =~ m/^https?\:\/\/.*\.4shared\.com\/.*\/(.*\/.*)\/dlink.*preview.mp3/) {
	$out="OK store-id=http://squid/4shared/preview/$1";

#4shared
} elsif ($u =~ m/^https?\:\/\/.*\.4shared\.com\/download\/(.*\/.*)\?tsid.*/) {
	$out="OK store-id=http://squid/4shared/download/$1";

#savefile-animeindo.tv
} elsif ($u =~ m/^https?:\/\/www\.savefile\.co\:182\/.*\/(.*\.(mp4|flv|3gp)).*/) {
	$out="OK store-id=http://squid/savefile:182/$1";

#imdb
} elsif ($u =~ m/^https?\:\/\/video\-http\.media\-imdb\.com\/(.*\.mp4)\?.*/) {
	$out="OK store-id=http://squid/imdb/$1";

#sourceforge
} elsif ($u =~ m/^https?\:\/\/.*\.dl\.sourceforge\.net\/([\w-]+\.[\w]{2,3})/) {
	$out="OK store-id=http://squid/sourceforge/$1";

#steampowered dota 2
} elsif ($u =~ m/^https?\:\/\/.*steam(powered|content).*\/((client|depot)\/[\d]+\/(chunk|manifest)\/[^\?\s]*).*/) {
	$out="OK store-id=http://squid/steam/content-powered/$2";

} elsif ($u=~ m/^https?\:\/\/.*youtube.*ptracking.*/){
	@video_id = m/[&?]video_id\=([^\&\s]*)/;
	@cpn = m/[&?]cpn\=([^\&\s]*)/;
	unless (-e "/tmp/@cpn"){
	open FILE, ">/tmp/@cpn";
	print FILE "@video_id";
	close FILE;
	}
	$out="ERR";
 
} elsif ($u=~ m/^https?\:\/\/.*youtube.*stream_204.*/){
	@docid = m/[&?]docid\=([^\&\s]*)/;
	@cpn = m/[&?]cpn\=([^\&\s]*)/;
	unless (-e "/tmp/@cpn"){
	open FILE, ">/tmp/@cpn";
	print FILE "@docid";
	close FILE;
	}
	$out="ERR";
 
} elsif ($u=~ m/^https?\:\/\/.*youtube.*player_204.*/){
	@v = m/[&?]v\=([^\&\s]*)/;
	@cpn = m/[&?]cpn\=([^\&\s]*)/;
	unless (-e "/tmp/@cpn"){
	open FILE, ">/tmp/@cpn";
	print FILE "@v";
	close FILE;
	}
	$out="ERR";

}elsif ($url =~ m/^https?:\/\/.*\.googlevideo\.com\/videoplayback\?.*/) {
        @id = m/[\&?|\%?|\s?]id=([^\&\%\s]+)/;
        @range = m/[\&?|\%?|\s?]range=([^\&\%\s]+)/;
        @itag = m/[\&?|\%?|\s?]itag=([^\&\%\s]+)/;
        @mime = m/[\&?|\%?|\s?]mime=([^\&\%\s]+)/;
        @clen = m/[\&?|\%?|\s?]clen=([^\&\%\s]+)/;
        if ($referer =~ m/^https?\:\/\/www\.youtube\.com\/(watch\?v\=|embed\/|v\/)(.*)/) {
            $v = $2;
        } else { $v = $id[0] }
        $out = "http://youtube.puji.ganteng.com/" . $v . "@range@itag@mime@clen";
 
} elsif ($u=~ m/^https?\:\/\/.*(youtube|googlevideo).*videoplayback.*/){
	@itag = m/[&?](itag\=[0-9]*)/;
	@range = m/[&?](range\=[^\&\s]*)/;
	@cpn = m/[&?]cpn\=([^\&\s]*)/;
	@mime = m/[&?](mime\=[^\&\s]*)/;
	@id = m/[&?]id\=([^\&\s]*)/;
 
	if (defined(@cpn[0])){
		if (-e "/tmp/@cpn"){
		open FILE, "/tmp/@cpn";
		@id = <FILE>;
		close FILE;}
	}
	$out="OK store-id=http://video-srv.squid.internal/id=@id@mime@range";

} else {
	$out="ERR";
}

if ($X[0] =~ m/^http.*/) {
	print "$out\n";
} else {
}
}
	print $logfh "$timenow"."out: $a $out\n" if ($debug>=1);
	print "$c $out\n";
}
close $logfh if ($debug)
