#include <queue>

int main()
{
   std::queue< double > values;
   
   values.push( 3.2 );
   values.push( 9.8 );
   values.push( 5.4 );

   cout << "Popping from values: ";
   
   while ( !values.empty() ) 
   {
      cout << values.front() << ' ';
      values.pop();
   }

   cout << endl;
   return 0;
