package ee.jaa.inspire;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class InspireActivity extends Activity {
	
	private Inspirator inspirator;
	
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        
        inspirator = new Inspirator();
    }
    
    public void getInspired(View view) {
    	TextView word = (TextView) findViewById(R.id.textInspiration);
    	word.setText(inspirator.inspire());
    }
}