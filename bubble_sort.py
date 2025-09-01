def bubble_sort(arr):
    """
    冒泡排序算法实现
    
    参数:
        arr: 待排序的列表
    
    返回:
        排序后的列表
    """
    n = len(arr)
    
    # 遍历所有数组元素
    for i in range(n):
        # 标记是否发生交换
        swapped = False
        
        # 最后 i 个元素已经排好序
        for j in range(0, n - i - 1):
            # 如果当前元素大于下一个元素，交换它们
            if arr[j] > arr[j + 1]:
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                swapped = True
        
        # 如果没有发生交换，说明数组已经排好序
        if not swapped:
            break
    
    return arr


def bubble_sort_with_steps(arr):
    """
    冒泡排序算法实现（显示排序步骤）
    
    参数:
        arr: 待排序的列表
    
    返回:
        排序后的列表
    """
    n = len(arr)
    print(f"原始数组: {arr}")
    
    for i in range(n):
        swapped = False
        print(f"\n第 {i + 1} 轮排序:")
        
        for j in range(0, n - i - 1):
            if arr[j] > arr[j + 1]:
                print(f"  交换 {arr[j]} 和 {arr[j + 1]}")
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                swapped = True
                print(f"  数组变为: {arr}")
        
        if not swapped:
            print("  没有发生交换，数组已排序完成")
            break
    
    return arr


# 测试代码
if __name__ == "__main__":
    # 测试示例1
    test_arr1 = [64, 34, 25, 12, 22, 11, 90]
    print("=== 冒泡排序示例 1 ===")
    print(f"排序前: {test_arr1}")
    sorted_arr1 = bubble_sort(test_arr1.copy())
    print(f"排序后: {sorted_arr1}")
    
    # 测试示例2（显示排序步骤）
    print("\n=== 冒泡排序示例 2（显示步骤）===")
    test_arr2 = [5, 2, 8, 1, 9]
    bubble_sort_with_steps(test_arr2.copy())
    
    # 测试示例3（已排序数组）
    print("\n=== 冒泡排序示例 3（已排序数组）===")
    test_arr3 = [1, 2, 3, 4, 5]
    print(f"排序前: {test_arr3}")
    sorted_arr3 = bubble_sort(test_arr3.copy())
    print(f"排序后: {sorted_arr3}")
    
    # 时间复杂度说明
    print("\n=== 冒泡排序复杂度分析 ===")
    print("时间复杂度:")
    print("  - 最好情况: O(n) - 数组已经排序")
    print("  - 平均情况: O(n²)")
    print("  - 最坏情况: O(n²) - 数组逆序")
    print("空间复杂度: O(1) - 原地排序")