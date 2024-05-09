package Exno14;

public class product {

  
    public static void main(String[] args) {
        if (("product available".equals(display("pen"))))

        {
            System.out.println("product available");
        }
    }

    private static String display(java.lang.String name) {
        demo.Ex14_Service service = new demo.Ex14_Service();
        demo.Ex14 port = service.getEx14Port();
        return port.display(name);
    }

}