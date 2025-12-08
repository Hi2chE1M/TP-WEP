____________HICHEM LEKHOUIMES____________

______________G03  3EME L______________


import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;


class MenuItem {
    private int id;
    private String name;
    private double price;

    public MenuItem(int id, String name, double price) {
        this.id = id;
        this.name = name;
        this.price = price;
    }

    public int getId() { return id; }
    public String getName() { return name; }
    public double getPrice() { return price; }

    @Override
    public String toString() {
        return id + ". " + name + " - " + price + " دج";
    }
}


class OrderItem {
    private MenuItem item;
    private int quantity;

    public OrderItem(MenuItem item, int quantity) {
        this.item = item;
        this.quantity = quantity;
    }

    public MenuItem getItem() { return item; }
    public int getQuantity() { return quantity; }
    public double getSubtotal() { return item.getPrice() * quantity; }

    @Override
    public String toString() {
        return item.getName() + " x" + quantity + " = " + getSubtotal() + " دج";
    }
}


class Order {
    private List<OrderItem> items = new ArrayList<>();

    public void addItem(OrderItem oi) { items.add(oi); }
    public void removeItem(int index) { if(index >= 0 && index < items.size()) items.remove(index); }
    public List<OrderItem> getItems() { return items; }

    public double getSubtotal() {
        double sum = 0;
        for(OrderItem oi : items) sum += oi.getSubtotal();
        return sum;
    }

    public double getTax() { return getSubtotal() * 0.1; } // 10% tax
    public double getTotal() { return getSubtotal() + getTax(); }
    public boolean isEmpty() { return items.isEmpty(); }
}


public class RestaurantTerminal {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        
        List<MenuItem> menu = new ArrayList<>();
        menu.add(new MenuItem(1,"بيتزا",1200));
        menu.add(new MenuItem(2,"همبرغر",800));
        menu.add(new MenuItem(3,"بطاطا مقلية",300));
        menu.add(new MenuItem(4,"مشروب غازي",150));

        Order order = new Order();

        while(true) {
            System.out.println("\n قائمة الطعام ");
            for(MenuItem m : menu) System.out.println(m);
            System.out.println("0. إنهاء الطلب / Checkout");

            System.out.print("اختر رقم الطبق: ");
            int choice = sc.nextInt();
            if(choice == 0) break;

            MenuItem selected = null;
            for(MenuItem m : menu) if(m.getId() == choice) selected = m;

            if(selected == null) {
                System.out.println("اختيار غير صالح");
                continue;
            }

            System.out.print("كمية هذا الطبق؟ ");
            int qty = sc.nextInt();
            order.addItem(new OrderItem(selected, qty));

            System.out.println("✔ تم إضافة " + qty + " x " + selected.getName());
        }

  
        System.out.println("\n=== الفاتورة ===");
        for(OrderItem oi : order.getItems()) System.out.println(oi);
        System.out.println("Subtotal: " + order.getSubtotal() + " دج");
        System.out.println("Tax (10%): " + order.getTax() + " دج");
        System.out.println("Total: " + order.getTotal() + " دج");
        System.out.println("شكراً لزيارتكم!");
    }
}
